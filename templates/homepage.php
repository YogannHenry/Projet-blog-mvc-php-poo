
<?php $title = "Le blog de Michel michel"; ?>


<!-- //ob_start() permet de mettre en mémoire tampon le contenu qui suit -->
<?php ob_start(); ?>


		<?php

		//on a récupéré nos posts dans le controller, on les affiche:
		foreach ($posts as $post) {
		?>
			<section class="text-orange-300 bg-stone-950 mb-10 body-font overflow-hidden shadow-2xl rounded-2xl ">
				<div class="container px-5 py-24 mx-auto">
					<div class="flex flex-wrap -m-12">
						<div class="p-12  flex flex-col items-start">
							<span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">CATEGORY</span>
							<h2 class="sm:text-3xl text-2xl title-font font-medium text-emerald-800 mt-4 mb-4"> <?= htmlspecialchars($post->title); ?>
								<em>le <?= $post->frenchCreationDate; ?></em>
							</h2>
							<p class="leading-relaxed mb-8"><?= nl2br(htmlspecialchars($post->content)); ?></p>
							<div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
								<a class="text-blue-500 inline-flex items-center ">
								<!-- e lien pointe vers index.php avec deux paramètres GET : action et id. Le paramètre action est défini 
								sur post et le paramètre id est défini sur la valeur de $post->identifier. -->
									<em><a href="index.php?action=post&id=<?= urlencode($post->identifier) ?>">Commentaires</a></em>

									<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path d="M5 12h14"></path>
										<path d="M12 5l7 7-7 7"></path>
									</svg>
								</a>


							</div>

						</div>

					</div>
				</div>
			</section>
<?php
		}
?>


<!-- ob_get_clean() permet de récupérer le contenu du tampon et de le stocker dans la variable $content -->
<?php $content = ob_get_clean(); ?>


<?php require('layout.php') ?>