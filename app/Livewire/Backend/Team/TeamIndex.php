<?php

namespace App\Livewire\Backend\Team;

use Livewire\Component;
use App\Models\TeamMember;
use Livewire\WithFileUploads;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class TeamIndex extends Component
{
    use WithFileUploads;

    public $team_id = null;

    public $name;
    public $position;
    public $bio;
    public $sort_order = 1;
    public $image;
    public $existingImage;

    public $phone;

    public function edit($id)
    {
        $t = TeamMember::findOrFail($id);

        $this->team_id    = $t->id;
        $this->name       = $t->name;
        $this->position   = $t->position;
        $this->bio        = $t->bio;
        $this->sort_order = $t->sort_order;
        $this->existingImage = $t->image;
        $this->phone      = $t->phone;

        session()->flash('info', 'Bearbeitung aktiviert.');
    }

    public function resetForm()
    {
$this->reset(['team_id','name','position','bio','sort_order','image','existingImage','phone']);

    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'position' => 'required|min:3',
            'bio' => 'required|min:5',
            'sort_order' => 'required|integer',
            'phone' => 'nullable|string|max:30',
            'image' => 'nullable|image',
        ]);

        $isNew = !$this->team_id;

        if ($isNew) {
            $member = new TeamMember();
        } else {
            $member = TeamMember::findOrFail($this->team_id);
        }

        $member->name = $this->name;
        $member->position = $this->position;
        $member->bio = $this->bio;
        $member->sort_order = $this->sort_order;
        $member->phone = $this->phone;

        // Bild?
        if ($this->image) {
            $service = new ImageService();
            $paths = $service->uploadTeamImage($this->image, $this->name);

            $member->image = $paths['avatar']; // Team nutzt Avatar
        }

        $member->save();

        session()->flash('success', $isNew ? 'Teammitglied hinzugefügt.' : 'Teammitglied bearbeitet.');

        $this->resetForm();
    }

    public function delete($id)
    {
        TeamMember::find($id)?->delete();
        session()->flash('success', 'Teammitglied gelöscht.');
    }


public function deleteImage()
{
    if (!$this->team_id) {
        return;
    }

    $member = TeamMember::findOrFail($this->team_id);

    // Datei löschen
    if ($member->image && Storage::exists($member->image)) {
        Storage::delete($member->image);
    }

    // DB-Spalte auf null setzen
    $member->image = null;
    $member->save();

    // Formular-UI aktualisieren
    $this->existingImage = null;
    $this->image = null;

    session()->flash('success', 'Bild wurde entfernt.');
}


    public function render()
    {
        return view('livewire.backend.team.team-index', [
            'team' => TeamMember::orderBy('sort_order')->get()
        ])
            ->extends('backend.layout.app')
            ->section('content')
            ->layoutData(['title' => 'Team Verwaltung']);
    }
}
