    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit="save" autocomplete="off">

                            {{-- Operations Done --}}
                            <div class="modal-body">
                                <label for="role">Operations</label>
                                <select wire:model="form.operation_id" id="operation_id" class="form-control"
                                        required>
                                    <option style="display:none" value="">Select Operation</option>
                                    @foreach ($this->GetOperation as $operation)
                                        <option value="{{ $operation->id }}">{{ $operation->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Lebal Done--}}
                            <div class="modal-body">
                                <label for="lebal">Lebal</label>
                                <input type="text" wire:model="form.lebal" class="form-control" required>
                            </div>

                            {{-- type Done--}}
                            <div class="modal-body">
                                <label for="type">Type</label>
                                <select wire:model="form.type" id="type" class="form-control" required>
                                    <option style="display:none" value="">Select Type</option>
                                    <option value="select">Select</option>
                                    <option value="text">Text</option>
                                    <option value="date">Date</option>
                                </select>
                            </div>

                            {{-- Value Done--}}
                            <div class="modal-body">
                                <label for="value">Value</label>
                                <input type="text" wire:model="form.value"  class="form-control" required>
                            </div>

                            {{-- event Done--}}
                            <div class="modal-body">
                                <label for="type">Event</label>
                                <select wire:model="form.event" id="type" class="form-control" required>
                                    <option style="display:none" value="">Select event</option>
                                    <option value="Change">On Change</option>
                                    <option value="click">Click</option>
                                    <option value="keydown">Keydown</option>
                                    <option value="submit">Submit</option>
                                </select>
                            </div>

                            {{-- body Done--}}
                            <div class="modal-body">
                                <label for="body">CallBack </label>
                                <textarea type="text" wire:model="form.callback"  class="form-control">   </textarea>
                            </div>

                            {{-- body Done--}}
                            <div class="modal-body">
                                <label for="body">Body </label>
                                return \App\Models\
                                <textarea type="text" wire:model="form.body"  class="form-control">   </textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Store Input</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

