<script>
    var navbuilderJson = <?= $this->structure ?>;
</script>
<div class="row">
    <form id="frmOut" action="<?= rex_url::currentBackendPage() ?>" method="post">
        <input type="hidden" name="id" value="<?= $this->id ?>" />

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h5 class="pull-left">Allgemein</h5>
                </div>
                <div class="panel-body" id="cont">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="name" type="text" name="config[name]" value="<?= $this->name ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h5 class="pull-left">Struktur</h5>
                </div>
                <div class="panel-body" id="cont">
                    <ul id="myEditor" class="sortableLists list-group"></ul>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="func" value="save" class="btn btn-success" id="btnOut">
                    <i class="glyphicon glyphicon-ok"></i> Speichern
                </button>
                <button data-confirm="Wirklich löschen?" type="submit" name="func" value="delete" class="btn btn-delete">
                    <i class="glyphicon glyphicon-delete"></i> Löschen
                </button>
            </div>
            <div class="form-group">
                <textarea class="hidden" id="structure" name="config[structure]" class="form-control" cols="50" rows="10"></textarea>
            </div>
        </div>
    </form>
    <div class="col-md-6">
        <form id="frmEdit" class="form-horizontal">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Gruppe</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="groupLabel" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="groupLabel" type="text" name="groupLabel" />
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="btnUpdateGroup" class="btn btn-primary">
                                <i class="fa fa-refresh"></i> Aktualisieren
                            </button>
                            <button type="button" id="btnAddGroup" class="btn btn-success">
                                <i class="fa fa-plus"></i> Hinzufügen
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Interner Link</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="internHref" class="col-sm-2 control-label">URL</label>
                                <div class="col-sm-10"><?= $this->widget ?></div>
                            </div>
                            <!--<div class="form-group">
                                <label for="target" class="col-sm-2 control-label">Ziel</label>
                                <div class="col-sm-10">
                                    <select name="target" id="target" class="form-control item-nav">
                                        <option value="_self">Self</option>
                                        <option value="_blank">Blank</option>
                                        <option value="_top">Top</option>
                                    </select>
                                </div>
                            </div>-->
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="btnUpdateIntern" class="btn btn-primary">
                                <i class="fa fa-refresh"></i> Aktualisieren
                            </button>
                            <button type="button" id="btnAddIntern" class="btn btn-success">
                                <i class="fa fa-plus"></i> Hinzufügen
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Externer Link</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="externLabel" class="col-sm-2 control-label">Label</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="externLabel" type="text" name="externLabel" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="externHref" class="col-sm-2 control-label">URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="externHref" type="text" name="externHref" />
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="btnUpdateExtern" class="btn btn-primary">
                                <i class="fa fa-refresh"></i> Aktualisieren
                            </button>
                            <button type="button" id="btnAddExtern" class="btn btn-success">
                                <i class="fa fa-plus"></i> Hinzufügen
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>