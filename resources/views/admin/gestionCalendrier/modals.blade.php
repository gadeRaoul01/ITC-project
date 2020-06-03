
<div class="modal fade " id="modal-form-addJourFerie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="jourForm">
                @csrf {{ method_field('POST') }}
                <div class="modal-header "
                     style="background-color: #6699cc;border-top-left-radius: inherit;border-top-right-radius: inherit">
                    <h4 class="modal-title-jour" id="myModalLabel" style="color: white"></h4>
                </div>
                <div class="modal-body ">


                    <div class="form-body">
                        <div class="form-group m-t-10">
                            <label for="jourDate" class="col-md-3 control-label">
                                Jour férié
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-calendar"></i>
                                    </span>
                                    <input type="hidden" id="id" name="id">
                                    <input type="hidden" id="anneeL" name="anneeL">
                                    <input class="form-control" placeholder="sélectionnez une date" id="jourDate"
                                           name="jourDate">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group m-t-10">
                            <label for="motif" class="col-md-3 control-label">
                                Motif
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-calendar"></i>
                                    </span>
                                    <input class="form-control" placeholder="Veuillez saisir le motif" id="motif"
                                           name="motif">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

                    <button type="submit" class="btn btn-primary " id="store-jour"></button>
                </div>
            </form>
        </div>
    </div>
</div>


