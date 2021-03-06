@extends('layouts.app', ['page' => 'Modification du compte'])

@section('content') 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> 
                <div class="panel-heading">Modification du compte</div>
                <div class="panel-body">  
                    <form role="form" method="POST" action="{{ route_manager('accounts.update', ['account' => $account]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <fieldset>
                            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input placeholder="Nom" type="text" class="form-control" id="name" name="name" aria-describedby="email_error" value="{{ $account->name ?? old('name') }}">   
                                <span class="form-control-feedback icon" aria-hidden="true"></span> 
                                @if ($errors->has('name'))
                                    <span id="email_error" class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div> 

                            <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                                <input placeholder="Description" type="text" class="form-control" id="description" name="description" aria-describedby="email_error" value="{{  $account->description ?? old('description') }}">   
                                <span class="form-control-feedback icon" aria-hidden="true"></span> 
                                @if ($errors->has('description'))
                                    <span id="email_error" class="help-block">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>  
 
                            <div class="form-group has-feedback {{ $errors->has('amount') ? 'has-error' : '' }}">
                                <input placeholder="Montant initial" type="number" class="form-control" id="amount" name="amount" aria-describedby="email_error" value="{{ $account->amount ?? old('amount') }}">   
                                <span class="form-control-feedback icon" aria-hidden="true"></span> 
                                @if ($errors->has('amount'))
                                    <span id="email_error" class="help-block">
                                        {{ $errors->first('amount') }}
                                    </span>
                                @endif
                            </div>  

                            <div class="form-group"> 
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="default" {{ $account->color == 'default' ? 'checked' : '' }}><span class="label label-default">Blanc</span>
                                </label>  
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="success" {{ $account->color == 'success' ? 'checked' : '' }} ><span class="label label-success">Vert</span>
                                </label> 
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="info" {{ $account->color == 'info' ? 'checked' : '' }}><span class="label label-info">Violet</span>
                                </label> 
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="warning" {{ $account->color == 'warning' ? 'checked' : '' }}><span class="label label-warning">Jaune</span>
                                </label> 
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="danger" {{ $account->color == 'danger' ? 'checked' : '' }}><

                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.span class="label label-danger">Rouge</span>
                                </label>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary" id="update_account">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Ajouter
                                </button>  
                            </div> 
                        </fieldset>
                    </form> 
                </div>
            </div><!-- /.panel-->
        </div>
    </div>
@endsection

@push('page')
    <script src="{{ js_asset('validations') }}"></script>
@endpush 