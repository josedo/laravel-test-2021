<?php

namespace App\Actions;

use App\Interfaces\IProcessMessage;
use Illuminate\Support\Str;
use App\Models\DailyMeeting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProcessMessage implements IProcessMessage
{
    /**
     * Process the chat message.
     *
     * @param  int  $user_id
     * @param  string  $message
     */
    public function process(int $user_id, string $message)
    {
        $dailys = explode('@daily', $message);
        foreach ($dailys as $daily) {
            $daily = Str::of($daily)->trim();
            if ($daily->isNotEmpty()) {
                $daily_meeting = [];
                $data_daily = Str::of($daily)->explode('#')->map(function ($item, $key) {
                    return $item = trim($item);
                })->toArray();
                foreach ($data_daily as $data) {
                    $exists = $this->findDataInMessage(DailyMeeting::data_message, $data);
                    if ($exists != FALSE)
                        $daily_meeting += $exists;
                }
                $daily_meeting['user_id'] = $user_id;
                $this->saveDailyMeeting($daily_meeting);
            }
        }
        return $message;
    }

    /**
     * Identifica, dentro del mensaje, la data de los diferentes ítems.
     *
     * @param  array  $array
     * @param  string  $string
     */
    private function findDataInMessage(array $array, string $string) {
        foreach ($array as $a) {
            if (Str::contains($string, "{$a}:")) {
                return [$a => trim(Str::after($string, "{$a}:"))];
            }
        }
        return false;
    }

    /**
     * Guarda en DB, la data validade en el mesanje recibido..
     *
     * @param  array  $daily_meeting
     */
    private function saveDailyMeeting(array $daily_meeting) {
        if (count($daily_meeting) > 1) {
            $validator = Validator::make($daily_meeting, [
                'user_id' => ['required', 'int'],
                'done' => ['nullable', 'string'],
                'doing' => ['nullable', 'string'],
                'blocking' => ['nullable', 'string'],
                'todo' => ['nullable', 'string'],
            ]);
            if (!$validator->fails()) {
                $validated = $validator->validated();
                DB::transaction(function () use ($validated) {
                    return tap(DailyMeeting::create($validated));
                });
            }
        }
    }
}
