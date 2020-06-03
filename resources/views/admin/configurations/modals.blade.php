{{--modal taux--}}
<div class="modal fade " id="modal-form-addTaux" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="">
                @csrf {{ method_field('POST') }}
                <div class="modal-header "
                     style="background-color: #6699cc;border-top-left-radius: inherit;border-top-right-radius: inherit">
                    <h4 class="modal-title-taux" id="myModalLabel" style="color: white"></h4>
                </div>
                <div class="modal-body ">

                    <div class="form-body">
                        <div class="form-group m-t-10">
                            <label for="motif" class="col-md-3 control-label">
                                Taux
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-pencil"></i>
                                    </span>
                                    <input type="number" min="1" required class="form-control" placeholder="Ex : 45" id="taux"
                                           name="taux">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

                    <button type="submit" class="btn btn-primary " id="store-taux"></button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--fin modal taux--}}
{{--modal nb_invest--}}
<div class="modal fade " id="modal-form-nbInvest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="">
                @csrf {{ method_field('POST') }}
                <div class="modal-header "
                     style="background-color: #6699cc;border-top-left-radius: inherit;border-top-right-radius: inherit">
                    <h4 class="modal-title-nbInvest" id="myModalLabel" style="color: white"></h4>
                </div>
                <div class="modal-body ">

                    <div class="form-body">
                        <div class="form-group m-t-10">
                            <label for="motif" class="col-md-3 control-label">
                                Nombre
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-pencil"></i>
                                    </span>
                                    <input type="number" min="1" required class="form-control" placeholder="Ex : 5" id="nbInvest"
                                           name="nbInvest">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

                    <button type="submit" class="btn btn-primary " id="store-nbInvest"></button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- fin modal nb_invest--}}

{{--modal nb_jr--}}
<div class="modal fade " id="modal-form-nb_jr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="">
                @csrf {{ method_field('POST') }}
                <div class="modal-header "
                     style="background-color: #6699cc;border-top-left-radius: inherit;border-top-right-radius: inherit">
                    <h4 class="modal-title-nb_jr" id="myModalLabel" style="color: white"></h4>
                </div>
                <div class="modal-body ">

                    <div class="form-body">
                        <div class="form-group m-t-10">
                            <label for="motif" class="col-md-3 control-label">
                                Nombre
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-pencil"></i>
                                    </span>
                                    <input type="number" min="1" required class="form-control" placeholder="Ex : 5" id="nb_jr"
                                           name="nb_jr">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

                    <button type="submit" class="btn btn-primary " id="store-nb_jr"></button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- fin modal nb_jr--}}


{{--modal intervalle_invest--}}
<div class="modal fade " id="modal-form-intervalle_invest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="">
                @csrf {{ method_field('POST') }}
                <div class="modal-header "
                     style="background-color: #6699cc;border-top-left-radius: inherit;border-top-right-radius: inherit">
                    <h4 class="modal-title-intervalle_invest" id="myModalLabel" style="color: white"></h4>
                </div>
                <div class="modal-body ">

                    <div class="form-body">
                        <div class="form-group m-t-10">
                            <label for="motif" class="col-md-3 control-label">
                                Min
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-pencil"></i>
                                    </span>
                                    <input type="number" min="1" required class="form-control" placeholder="Ex : 1000" id="min"
                                           name="min">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group m-t-10">
                            <label for="motif" class="col-md-3 control-label">
                                Max
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-pencil"></i>
                                    </span>
                                    <input type="number" min="1" required class="form-control" placeholder="Ex : 5000" id="max"
                                           name="max">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

                    <button type="submit" class="btn btn-primary " id="store-intervalle_invest"></button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- fin modal intervalle_invest--}}


{{--modal nb_recup--}}
<div class="modal fade " id="modal-form-nb_recup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="">
                @csrf {{ method_field('POST') }}
                <div class="modal-header "
                     style="background-color: #6699cc;border-top-left-radius: inherit;border-top-right-radius: inherit">
                    <h4 class="modal-title-nb_recup" id="myModalLabel" style="color: white"></h4>
                </div>
                <div class="modal-body ">

                    <div class="form-body">
                        <div class="form-group m-t-10">
                            <label for="motif" class="col-md-3 control-label">
                               Nombre
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-pencil"></i>
                                    </span>
                                    <input type="number" min="1" required class="form-control" placeholder="Ex : 2" id="nb_recup"
                                           name="nb_recup">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

                    <button type="submit" class="btn btn-primary " id="store-nb_recup"></button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- fin modal nb_recup--}}
