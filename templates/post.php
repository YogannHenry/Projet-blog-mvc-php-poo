<?php ob_start(); ?>

        
        <div>
          <a class="bg-emerald-950 px-4 text-white p-2 rounded-lg text-lg mb-10" href="index.php">Retour à l'acceuil</a>
        </div>

        <section class="mt-10 text-orange-300 bg-stone-950 mb-10 body-font overflow-hidden shadow-2xl rounded-2xl ">
				<div class="container px-5 py-24 mx-auto">
					<div class="flex flex-wrap -m-12">
						<div class="p-12 flex flex-col items-start">
							<span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">CATEGORY</span>
							<h2 class=" text-3xl title-font font-medium text-emerald-800 mt-4 mb-4"> <?= htmlspecialchars($post->title); ?>
								<em>le <?= $post->frenchCreationDate; ?></em>
							</h2>
							<p class="leading-relaxed mb-8" ><?= nl2br(htmlspecialchars($post->content)); ?></p>
							

						</div>

					</div>
				</div>
			</section>

        <h2 class="text-lg font-bold">Rédiger un commentaire:</h2>

<form class="w-full" action="index.php?action=addComment&id=<?= $post->identifier?>" method="post">
   <div>
  	<label  class="text-lg font-bold" for="author">Auteur</label><br />
  	<input class="border-solid border-black bg-gray-200 mb-5" type="text" id="author" name="author" />
   </div>
   <div class="w-screen">
   <label  class="text-lg font-bold" for="author">Commentaire</label><br />
       <textarea class="bg-gray-200" id="comment" name="comment"></textarea>
    </div>
    <div>
        <input class="bg-emerald-950 px-4 text-white p-2 rounded-lg text-lg" type="submit" />
    </div>
</form>


<?php require('templates/comment.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>