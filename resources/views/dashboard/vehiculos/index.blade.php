<x-layouts.app> <x-layouts.content title="Vehículos" subtitle="" name="Vehículos"> <div class="row"> <div
    class="col-12"> <div class="mb-2 d-flex justify-content-between">

    <div class="form-group"> <a href="{{ route('vehiculos.create') }}" class="btn btn-primary waves-effect waves-light">
        <i class="fas fa-plus-circle"></i>&nbsp;
        Nuevo vehículo
        </a>
    </div>
    </div> <div class="card-box">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="mb-2 d-flex justify-content-between">

                        <div class="form-group d-none d-lg-flex align-items-center">
                            <span>Mostrar</span>
                            <select wire:model="cant" class="custom-select px-3 mx-1">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span>registros</span>
                        </div>

                        <div class="form-group w-50 d-flex">
                            <input type="text" class="form-control" placeholder="Buscar...">
                            <button class="btn text-secondary" type="button" disabled>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <div class="form-group">
                        <a href="{{ route('vehiculos.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Registrar Vehiculo
                        </a>
                    </div>

                    </div>


        </td>

        <td class="align-middle text-nowrap">
            <a href="{{ route('vehiculos.edit', $vehiculo['id']) }}" title="Editar" class="btn btn-sm btn-primary"><i
                    class="fas fa-edit"></i></a>
            <a href="{{ route('vehiculos.delete', $vehiculo['id']) }}" title="Eliminar" class="btn btn-sm btn-danger"><i
                    class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
    </div>

    </div>
    </div>
    </div>

    </x-layouts.content>

    </x-layouts.app>