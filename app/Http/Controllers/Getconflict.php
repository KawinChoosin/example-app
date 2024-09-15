<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiaryEntry;
use Illuminate\Support\Facades\Auth;
use App\Models\Emotion;
use Illuminate\Support\Facades\DB;

class Getconflict extends Controller
{
    public function index()
    {
        // Get the paginated diary entries with their associated emotions
        $diaryEntries = Auth::user()->diaryEntries()->with('emotions')->paginate(3);

        // Get the logged-in user ID
        $userId = Auth::id();

        // Count how many diaries are related to each emotion
        $data = DB::table('diary_entry_emotions as dee')
            ->join('diary_entries as de', 'dee.diary_entry_id', '=', 'de.id')
            ->join('emotions as emo', 'dee.emotion_id', '=', 'emo.id')
            ->select('dee.id', 'de.date', 'de.content', 'emo.name', 'dee.intensity')
            ->where('de.user_id', $userId) // Add this line to ensure you're querying the current user's diary entries
            ->where('de.content', 'like', '%happy%')
            ->where('emo.name', 'Sad')
            ->get();

        // Return the view with both diary entries and summary data
        return view('getconflict.index', compact('diaryEntries', 'data'));
    }


}
