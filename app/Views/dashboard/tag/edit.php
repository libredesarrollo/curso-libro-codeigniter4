<?= view("dashboard/partials/_form-error"); ?>
<form action="/dashboard/tag/update/<?= $tag->id ?>" method="POST">
<?= view("dashboard/tag/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>