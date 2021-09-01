<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1, user-scalable=yes">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
 
	<div class="container-fluid" style="margin-top: 100px">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                <div class="pull-left"><h3>Lista de Comentarios</h3></div>
                <div class="pull-right">
                    <div class="btn-group">
                    <a href="{{ route('products.index') }}" class="btn btn-info" >Productos</a>
                    </div>
                    <div class="btn-group">
                    
                    <a href="{{ route('createComments', ['id' => $product]) }}" class="btn btn-info" >Añadir Comentario</a>
                    </div>
                </div>
                <div class="table-container">
                    <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th>Comentario</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </thead>
                    <tbody>
                    @if($comments->count())  
                    @foreach($comments as $comment)  
                    <tr>
                        <td>{{$comment->description}}</td>
                        <td><a class="btn btn-primary btn-xs" href="{{ route('showComments', ['id' => $product,'comment_id' => $comment->id]) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td>
                            <form action="{{ route('destroyComments',['id' => $product,'comment_id' => $comment->id]) }}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
            
                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                    @endforeach 
                    @else
                    <tr>
                        <td colspan="8">No hay registro !!</td>
                    </tr>
                    @endif
                    </tbody>
        
                </table>
                </div>
            </div>
            
            </div>
        </div>
    </section>
    </div>
<style type="text/css">
	.table {
		border-top: 2px solid #ccc;
	}
</style>
</body>
</html>