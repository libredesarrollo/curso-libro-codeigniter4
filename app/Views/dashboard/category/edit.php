<?= view("dashboard/partials/_form-error"); ?>
<form action="/dashboard/category/update/<?= $category->id ?>" method="POST">
<?= view("dashboard/category/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>