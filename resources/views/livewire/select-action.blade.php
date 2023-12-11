<div >
    <div class="card border-primary mb-5 mt-3">
        <div class="card-header">
            <h4>Panel Name : {{ $panel->name }}</h4>
        </div>
        <div class="card-body text-primary">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h5 class="card-text">Database Name : {{ $panel->db_name }}</h5>
                    <h5 class="card-text"> Port :{{ $panel->port }}</h5>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h5 class="card-text">Url : {{ $panel->url}}</h5>
                    <h5 class="card-text">server: {{ $panel->server }}</h5>
                </div>
            </div>
        </div>
    </div>
    @if($this->Connection)
        <div class="alert alert-success  text-center"> {{ __('Connected to ' . $panel->name . ' Dashboard') }}</div>
    @else
        <div class="alert alert-danger text-center"> {{ __('Not Connected') }}</div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form wire:submit="save">

                            <div class="mb-3">
                                <label for="role">Department</label>
                                <select wire:model="form.department" id="form.department"
                                        class="form-control" wire:change="ChangeDepartment">
                                    <option style="display:none" value="">Select Department</option>
                                    @foreach ($this->GetDepartment as $department)
                                        <option value="{{ $department->value }}">{{ $department->title }}</option>
                                    @endforeach
                                </select>
                                <div style="color:red">
                                    @error('form.department') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            @if($SelectDepartment)
                                <div class="mb-3">
                                    <label for="role">Operation</label>
                                    <select wire:model="form.operation" id="form.operation"
                                            class="form-control" wire:change="ChangeOperation">
                                        <option style="display:none" value="">Select Department</option>
                                        @foreach ($this->GetOperation as $operaion)
                                            <option value="{{ $operaion->value }}">{{ $operaion->title }}</option>
                                        @endforeach
                                    </select>
                                    <div style="color:red">
                                        @error('form.operation') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @endif


                            @if($SelectOperation)
                                @foreach($this->GetInput as $input)
                                    @if($input->type != "select")
                                        <div class="mb-3">
                                            <label for="dateline" class="form-label">{{$input->label}}</label>
                                            <input type="{{$input->type}}" wire:model="form.input.{{$input->value}}"
                                                   class="form-control" min=""
                                                   max="2040-11-06" id="dateline" aria-describedby="dateline"
                                                   value=""
                                                   @if($input->callback) wire:{{$input->event}}="RunCallBack('{{$input->value}}')"
                                                   @endif required>
                                        </div>
                                    @elseif($input->type == "select")
                                        <div class="mb-3">
                                            <label for="role">{{$input->label}}</label>

                                            <select wire:model="form.input.{{$input->value}}" class="form-control"
                                                    @if($input->callback) wire:{{$input->event}}="RunCallBack('{{$input->value}}')" @endif>

                                                <option style="display:none" value="">Select {{$input->label}}</option>

                                                @if(!isset($SelectInputs))
                                                    @foreach($data_select as $key => $vale)
                                                        <option value="{{ $key }}"> {{ $vale }} </option>
                                                    @endforeach
                                                @endif

                                                @if($SelectInputs)
                                                    @foreach ($SelectInputs as $input)
                                                        <option value="{{ $input['id'] }}">{{ $input['name'] }}</option>
                                                    @endforeach
                                                @endif

                                            </select>

                                            <div style="color:red">
                                                @error('form.operation') <span
                                                    class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    @endif
                                @endforeach
                            @endif


                            <div class="text-center">
                                <button class="btn btn-primary" type="submit"> Confirm</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>




