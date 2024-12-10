<div class="container">
    <div class="p-2">
        <div class="col-lg-12">
            <div class="card p-3">

                <div class="card-body">

                    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">



                        <div class="form-group">
                            <label for="name">Role Name:</label>
                            <input type="text" id="name" class="form-control" wire:model="name" required>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" class="form-control" wire:model="description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label"><strong> Selecciona la categoria a donde pertenece</strong></label>
                            <div class="d-flex flex-wrap">
                                @foreach($categories as $category)
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" wire:model="category" id="category{{ $category }}" name="category" value="{{ $category }}">
                                        <label class="form-check-label" for="category{{ $category }}">
                                            {{ $category }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="accordion mt-2" id="permissionsAccordion">
                            @foreach ($permissionCategory as $categoryName => $subcategories)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{ Str::slug($categoryName) }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ Str::slug($categoryName) }}" aria-expanded="true" aria-controls="collapse-{{ Str::slug($categoryName) }}">
                                            {{ $categoryName }}
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ Str::slug($categoryName) }}" class="accordion-collapse collapse show" aria-labelledby="heading-{{ Str::slug($categoryName) }}" data-bs-parent="#permissionsAccordion">
                                        <div class="accordion-body">
                                            <div class="row">
                                                @foreach ($subcategories as $subcategoryName => $permissionsList)
                                                    <div class="col-md-3 my-2">
                                                        <h6>{{ $subcategoryName }}</h6>
                                                        @foreach ($permissionsList as $permission)
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input"
                                                                    type="checkbox"
                                                                    id="permission-{{ $permission['id'] }}"
                                                                    value="{{ $permission['id'] }}"
                                                                    wire:model.defer="permissions"
                                                                    {{ in_array($permission['id'], $permissions) ? 'checked' : '' }}
                                                                >
                                                                <label class="form-check-label" for="permission-{{ $permission['id'] }}">
                                                                    {{ $permission['name'] }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('role.list') }}" class="btn-custom-outline">
                                Cancelar
                            </a>

                            <button type="submit" class="btn-custom">
                                Continuar
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
