    <livewire:dropzone
        wire:model="upload"
        :rules="['mimes:png,jpeg,doc,pdf,ppt,dwg,kml,mov','max:10420']"
        :multiple="false" />

