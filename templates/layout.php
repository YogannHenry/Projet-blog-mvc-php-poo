<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
      <link href="style.css" rel="stylesheet" /> 
      <script src="https://cdn.tailwindcss.com"></script>
   </head>

   <body>
   <div class="flex items-center justify-center min-h-screen bg-stone-950  pt-20 ">
	<div class=" bg-orange-300 rounded shadow-lg p-6  w-1/2 items-center pt-20 shadow-lg">
		<h1 class="text-3xl drop-shadow-lg font-medium title-font text-orange-300 bg-stone-950 mb-12 text-center w-full border-solid border-4 border-emerald-900 border rounded-2xl p-8">Créative CDA Blog!</h1>
		<p class="text-2xl font-medium title-font text-emerald-700 bg-stone-950 mb-12 text-center w-fit border rounded-2xl p-4">Les derniers posts :</p>

      <!-- //ici on affiche le contenu de la variable $content -->
      <?= $content ?>

      </div>
</div>
   </body>
</html>