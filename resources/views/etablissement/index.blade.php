@extends('layouts.back')
@section('content')
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">{{$data['breadcumb']}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="product-status mg-b-15">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="product-status-wrap">
                <h4>{{$data['title']}}</h4>
                <div class="add-product">
                    <a href="{{route('create-etab')}}">Ajouter Nouveau</a>
                </div>
                <div class="asset-inner">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Code</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Responsable</th>
                            <th>Ville</th>
                            <th>Adresse</th>
                            <th>Etat</th>
                            <th>Action</th>
                        </tr>
                        @if (count($etablissements)>0)
                        @foreach ($etablissements as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td><img src="image/{{ $item->logo }}" alt="" /></td>
                            <td>{{$item->code}}</td>
                            <td>
                                {{$item->telephone}}
                            </td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->responsable}}</td>
                            <td>{{$item->ville}}</td>
                            <td>{{$item->adresse}}</td>
                            <td>
                                @if ($item->etat ==1)
                                <button class="pd-setting">Active</button>
                                @else
                                <button class="btn btn-danger">Desactivé</button>
                                @endif
                            </td>
                            <td>
                                <button data-toggle="tooltip" title="Edit" class="btn btn-custon-two btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> editer</button>
                                <button data-toggle="tooltip" title="Trash" class="btn btn-custon-three btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <div class="alert alert-warning">Aucun données disponible pour le moment!</div>
                        @endif
                    </table>
                </div>
                <div class="custom-pagination">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
