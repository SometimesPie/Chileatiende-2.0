<div>
    <ol class="breadcrumb">
        <li><a href="backend">Inicio</a></li>
        <li class="active">Fichas</li>
    </ol>

    <div>
        <a class="btn btn-success" href="backend/fichas/create">Agregar ficha</a>
    </div>

    <div class="row">
        <div class="col-sm-offset-6 col-sm-6">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" name="query" value="<?=$query?>" placeholder="Ej: bono marzo">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center"><?=$pages->links()?></div>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre del trámite</th>
            <th>Publicado</th>
            <th>Última modificación</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($pages as $p):?>
        <tr>
            <td><?=$p->id?></td>
            <td><a href="backend/fichas/<?=$p->id?>"><?=$p->title?></a></td>
            <td class="text-center">
                <?php if($p->published):?>
                    <i class="material-icons" title="Publicado">check</i>
                    <?=$p->lastVersion()->published ? '' : '<i class="material-icons">call_merge</i>'?>
                <?php endif ?>
            </td>
            <td><?=$p->updated_at?></td>
            <td class="text-center"><a href="backend/fichas/<?=$p->id?>/edit"><i class="material-icons">edit</i></a></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <div class="text-center"><?=$pages->links()?></div>
</div>