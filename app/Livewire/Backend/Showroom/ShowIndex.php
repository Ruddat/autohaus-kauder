<?php

namespace App\Livewire\Backend\Showroom;

use Livewire\Component;
use App\Models\ShowroomImage;
use Livewire\WithFileUploads;

class ShowIndex extends Component
{
    use WithFileUploads;

    // Form fields
    public $title;
    public $subtitle;
    public $image;
    public $sort_order = 1;

    // Edit mode
    public $editId = null;
    public $existingImage = null;

    protected $rules = [
        'title' => 'required',
        'subtitle' => 'nullable',
        'sort_order' => 'required|integer',
    ];

    public function setEdit($id)
    {
        $item = ShowroomImage::findOrFail($id);

        $this->editId = $item->id;
        $this->title = $item->title;
        $this->subtitle = $item->subtitle;
        $this->sort_order = $item->sort_order;
        $this->existingImage = $item->image;

        // Damit man klar sieht, dass wir im Edit sind
        session()->flash('info', 'Bearbeitungsmodus aktiviert.');
    }

    public function cancelEdit()
    {
        $this->reset(['title','subtitle','image','sort_order','editId','existingImage']);
    }

    public function save()
    {
        if ($this->editId) {
            return $this->update();
        }

        // CREATE
        $this->validate(array_merge($this->rules, [
            'image' => 'required|image',
        ]));

        $path = $this->image->store('showroom', 'public');

        ShowroomImage::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $path,
            'sort_order' => $this->sort_order,
        ]);

        $this->cancelEdit();
        session()->flash('success', 'Showroom-Bild wurde erfolgreich hinzugefügt.');
    }

    public function update()
    {
        $item = ShowroomImage::findOrFail($this->editId);

        $this->validate($this->rules);

        // Bild optional ersetzen
        if ($this->image) {
            $this->validate(['image' => 'image']);
            $path = $this->image->store('showroom', 'public');
            $item->image = $path;
        }

        $item->title = $this->title;
        $item->subtitle = $this->subtitle;
        $item->sort_order = $this->sort_order;
        $item->save();

        $this->cancelEdit();
        session()->flash('success', 'Showroom-Bild wurde aktualisiert.');
    }

    public function delete($id)
    {
        ShowroomImage::find($id)?->delete();
        session()->flash('success', 'Bild wurde gelöscht.');
    }

    public function render()
    {
        return view('livewire.backend.showroom.show-index', [
            'items' => ShowroomImage::orderBy('sort_order')->get(),
        ])
            ->extends('backend.layout.app')
            ->section('content')
            ->layoutData(['title' => 'Showroom Bilder']);
    }
}
