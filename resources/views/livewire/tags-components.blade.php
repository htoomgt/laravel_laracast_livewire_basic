<div
    wire:ignore
    class="w-1/2 border px-4 py-2"
    x-data
    x-init="
                    new Taggle($el, {
                        tags : {{$tags}},
                        onTagAdd: function(e, tag){
                            {{--alert('You just added '+ tag +'')--}}
                            Livewire.emit('tagAdded', tag);
                        },
                        onTagRemove: function(e, tag){
                            {{--alert('You just removed'+ tag +'')--}}
                            Livewire.emit('tagRemoved', tag);
                        }
                    })

                    Livewire.on('tagAddedFromBackend', tag => {
                        alert('A tag was added with the id of: ' + tag);
                    })
                "
>

</div>
