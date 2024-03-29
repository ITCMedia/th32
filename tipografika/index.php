<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Типографика");
?>
 <section class="section-st section-st--dark">
			<div class="container-site">
				<span class="title-site--h2">Bread crumbs</span>
				<ul class="bread-crumbs">
					<li><a href="#">Теплохаус</a></li>
					<li><a href="#">Каталог</a></li>
					<li><a href="#">Котлы</a></li>
					<li>Котел стальной Патриот 12,5 без дымохода</li>
				</ul>
			</div>
		</section>


		<section class="section-st section-st--light">
			<div class="container-site">
				<span class="title-site--h2">Pagination</span>
				<ul class="pagination">
					<li class="pagination__prev"><a href="#"></a></li>
					<li class="pagination__active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">...</a></li>
					<li><a href="#">15</a></li>
					<li class="pagination__next"><a href="#"></a></li>
				</ul>
			</div>
		</section>


		<section class="section-st section-st--dark">
			<div class="container-site">
				<span class="title-site--h2">Buttons</span>
				<a href="#" class="btn btn--sm">Small</a>
				<a href="#" class="btn btn--sm btn--min-width">Min width</a>
				<a href="#" class="btn btn--sm btn--second-st">Second style</a>
				<a href="#" class="btn btn--sm btn--border">Border</a>
				<a href="#" class="btn btn--sm btn--icon">
					<i class="btn__icon btn__icon--left"></i>
					<span class="btn__icon-text">Icon left</span>
				</a>
				<a href="#" class="btn btn--sm btn--icon">
					<span class="btn__icon-text">Icon right</span>
					<i class="btn__icon btn__icon--right"></i>
				</a>
				<br>
				<br>
				<a href="#" class="btn">Default</a>
				<a href="#" class="btn btn--min-width">Min width</a>
				<a href="#" class="btn btn--second-st">Second style</a>
				<a href="#" class="btn btn--border">Border</a>
				<a href="#" class="btn btn--icon">
					<i class="btn__icon btn__icon--left"></i>
					<span class="btn__icon-text">Icon left</span>
				</a>
				<a href="#" class="btn btn--icon">
					<span class="btn__icon-text">Icon right</span>
					<i class="btn__icon btn__icon--right"></i>
				</a>
				<a href="#" class="btn btn--border">
					<i class="icon icon-arrow"></i>
				</a>
				<br>
				<br>
				<a href="#" class="btn btn--md">Middle</a>
				<a href="#" class="btn btn--md btn--second-st">Second style</a>
				<a href="#" class="btn btn--md btn--border">Border</a>
				<a href="#" class="btn btn--md btn--icon">
					<i class="btn__icon btn__icon--left"></i>
					<span class="btn__icon-text">Icon left</span>
				</a>
				<a href="#" class="btn btn--md btn--icon">
					<span class="btn__icon-text">Icon right</span>
					<i class="btn__icon btn__icon--right"></i>
				</a>
				<br>
				<br>
				<a href="#" class="btn btn--lg">Large</a>
				<a href="#" class="btn btn--lg btn--second-st">Second style</a>
				<a href="#" class="btn btn--lg btn--border">Border</a>
				<a href="#" class="btn btn--lg btn--icon">
					<i class="btn__icon btn__icon--left"></i>
					<span class="btn__icon-text">Icon left</span>
				</a>
				<a href="#" class="btn btn--lg btn--icon">
					<span class="btn__icon-text">Icon right</span>
					<i class="btn__icon btn__icon--right"></i>
				</a>
			</div>
		</section>


		<section class="section-st section-st--light">
			<div class="container-site">
				<form action="#" class="st-form">
					<span class="st-form__tt title-site--h2">Form</span>
					<div class="form-group">
						<label for="formName" class="form-group__label">Text</label>
						<input id="formName" class="form-group__field error" type="text" placeholder="Your name" required>
						<div class="error-label">Текст ошибки</div>
					</div>
				
					<div class="form-group">
						<label for="formPassword" class="form-group__label">Password</label>
						<input id="formPassword" class="form-group__field" type="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Не менее восьми символов, содержащих хотя бы одну цифру и символы из верхнего и нижнего регистра" required>
					</div>
				
				
					<div class="form-group form-group--inline">
						<label for="formEmail" class="form-group__label">E-mail</label>
						<input id="formEmail" class="form-group__field" type="email" placeholder="E-mail" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required>
					</div>
				
					<div class="form-group form-group--inline">
						<label for="formPhone" class="form-group__label">Phone number long string</label>
						<input id="formPhone" class="form-group__field" type="tel" placeholder="+7" required>
					</div>
				
				
					<div class="form-group-grid">
						<div class="form-group form-group-grid__half-col">
							<label for="formSearch" class="form-group__label">Search</label>
							<input id="formSearch" class="form-group__field" type="search" placeholder="Search">
						</div>
				
						<div class="form-group form-group-grid__half-col">
							<label for="formUrl" class="form-group__label">Website</label>
							<input id="formUrl" class="form-group__field" type="url" placeholder="Url your website" pattern="(http|https)://.+">
						</div>
					</div>
				
				
					<div class="form-group-grid">
						<div class="form-group form-group-grid__three-col">
							<label class="form-group__label">Text</label>
							<input class="form-group__field" type="text" placeholder="Your name" required>
						</div>
				
						<div class="form-group form-group-grid__three-col">
							<label class="form-group__label">Text</label>
							<input class="form-group__field" type="text" placeholder="Your name" required>
						</div>
				
						<div class="form-group form-group-grid__three-col">
							<label class="form-group__label">Text</label>
							<input class="form-group__field" type="text" placeholder="Your name" required>
						</div>
					</div>
				
				
					<div class="form-group-grid">
						<div class="form-group form-group-grid__four-col">
							<label class="form-group__label">Text</label>
							<input class="form-group__field" type="text" placeholder="Your name" required>
						</div>
				
						<div class="form-group form-group-grid__four-col">
							<label class="form-group__label">Text</label>
							<input class="form-group__field" type="text" placeholder="Your name" required>
						</div>
				
						<div class="form-group form-group-grid__four-col">
							<label class="form-group__label">Text</label>
							<input class="form-group__field" type="text" placeholder="Your name" required>
						</div>
				
						<div class="form-group form-group-grid__four-col">
							<label class="form-group__label">Text</label>
							<input class="form-group__field" type="text" placeholder="Your name" required>
						</div>
					</div>
				
					<div class="form-group-grid">
						<div class="form-group form-group-grid__four-col">
							<div class="check-bl">
								<label>
									<input type="checkbox">
									<span class="check-bl-txt">Чекбокс</span>
								</label>
							</div>
						</div>
						<div class="form-group form-group-grid__four-col">
							<div class="check-bl">
								<label>
									<input type="checkbox" checked>
									<span class="check-bl-txt">Чекбокс</span>
								</label>
							</div>
						</div>
						<div class="form-group form-group-grid__four-col">
							<div class="radio-bl">
								<label>
									<input type="radio">
									<span class="radio-bl-txt">Радио</span>
								</label>
							</div>
						</div>
						<div class="form-group form-group-grid__four-col">
							<div class="radio-bl">
								<label>
									<input type="radio" checked>
									<span class="radio-bl-txt">Радио</span>
								</label>
							</div>
						</div>
					</div>
				
				
					<div class="form-group text--center">
						<button class="btn btn--md btn--min-width" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</section>


		<section class="section-st section-st--dark">
			<div class="container-site">
				<span class="title-site--h2">Text</span>
				<div class="text-bl">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda reiciendis, sint quam iste dicta quasi sapiente ipsum blanditiis voluptatum repellat delectus, veniam eligendi non totam, dolore aliquam temporibus quidem commodi.</p>
					<h1>h1 rubl ---------------> ₽</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda reiciendis, sint quam iste dicta quasi sapiente ipsum blanditiis voluptatum repellat delectus, veniam eligendi non totam, dolore aliquam temporibus quidem commodi.</p>
					<div class="text--center">
						<h2>h2 Text center</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda reiciendis, sint quam iste dicta quasi sapiente ipsum blanditiis voluptatum repellat delectus, veniam eligendi non totam, dolore aliquam temporibus quidem commodi.</p>
					</div>
					<div class="text--right">
						<h3>h3 text right</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda reiciendis, sint quam iste dicta quasi sapiente ipsum blanditiis voluptatum repellat delectus, veniam eligendi non totam, dolore aliquam temporibus quidem commodi.</p>
					</div>
					<div class="text--uppercase">
						<h4>h4 text uppercase</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda reiciendis, sint quam iste dicta quasi sapiente ipsum blanditiis voluptatum repellat delectus, veniam eligendi non totam, dolore aliquam temporibus quidem commodi.</p>
					</div>
					<h5>h5 Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda reiciendis, sint quam iste dicta quasi sapiente ipsum blanditiis voluptatum repellat delectus, veniam eligendi non totam, dolore aliquam temporibus quidem commodi.</p>
					<h6>h6 Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, similique. Architecto quo cum, sunt consequuntur quaerat, commodi ratione natus laboriosam deserunt error numquam et optio, possimus beatae rem ex. Unde.</p>
					<br>
					<ul class="content-list">
						<li>Lorem ipsum.</li>
						<li>Lorem ipsum.</li>
						<li>Lorem ipsum.</li>
					</ul>
					<br>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora magnam, similique quam blanditiis aperiam accusamus quia. Sed nam ullam ut maiores. Voluptas deleniti delectus, temporibus nam enim vero ea molestiae.</p>
					<br>
					<ol>
						<li>Lorem ipsum.</li>
						<li>Lorem ipsum.</li>
						<li>Lorem ipsum.</li>
					</ol>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, similique. Architecto quo cum, sunt consequuntur quaerat, commodi ratione natus laboriosam deserunt error numquam et optio, possimus beatae rem ex. Unde.</p>
					<br>
				</div>


				<span class="title-site--h3">Two column text</span>
				<div class="text-bl-grid">
					<div class="text-bl text-bl-grid__half-col">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sapiente nemo, eligendi facilis accusamus sequi est hic rerum et repellendus voluptas provident. Nisi, nihil qui earum a, pariatur esse, fuga nobis possimus quisquam repudiandae nostrum placeat ipsa itaque? Veniam cumque laboriosam repudiandae, totam nihil doloremque explicabo. Recusandae voluptatibus, tenetur praesentium sed cum dicta a tempora. Esse delectus commodi totam enim, laborum a excepturi assumenda sit voluptatum consequatur accusantium impedit ea quisquam libero. Ipsa, molestiae fugit neque ut, adipisci est iusto dicta aliquam maiores nulla tempora consequatur amet alias, eveniet nam numquam ab iste non possimus similique? Quia quo esse distinctio.</p>
					</div>
					<div class="text-bl text-bl-grid__half-col">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, non consequuntur harum aliquam quibusdam placeat. Ipsam alias consequuntur, iure vitae ad. Quas error ut dolorum vero et commodi voluptatum. Distinctio perferendis fuga, excepturi? Tempore, corporis architecto! Pariatur hic dignissimos libero ullam. Molestiae ullam, voluptatibus sunt labore. Consequuntur et sapiente maxime harum esse aperiam, rem amet est numquam quos nobis optio veniam maiores neque repellat minima, debitis blanditiis odio. Quam molestiae non nobis hic qui et explicabo sit, debitis, accusantium laboriosam illum blanditiis. Amet explicabo a vitae quos praesentium doloribus, modi consequatur? Velit dolores officia libero vel sapiente beatae, quibusdam! Fugiat.</p>
					</div>
				</div>
			</div>
		</section>

		<section class="section-st section-st--light">
			<div class="container-site">
				<div class="korpus">
					<ul class="tabs js-tabs">
						<li class="current">Описание</li>
						<li>Характеристики</li>
						<li>Сертификаты</li>
						<li>Доставка</li>
					</ul>
					<div class="box visible">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda facere excepturi a voluptatem odio, alias, libero obcaecati ullam! Id quod dignissimos, officiis, facilis voluptate laudantium mollitia qui voluptates sequi.</p>
					</div>
					<div class="box">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda facere excepturi a voluptatem odio, alias, libero obcaecati ullam! Id quod dignissimos, officiis, facilis voluptate laudantium mollitia qui voluptates sequi.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda facere excepturi a voluptatem odio, alias, libero obcaecati ullam! Id quod dignissimos, officiis, facilis voluptate laudantium mollitia qui voluptates sequi.</p>
					</div>
					<div class="box">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda facere excepturi a voluptatem odio, alias, libero obcaecati ullam! Id quod dignissimos, officiis, facilis voluptate laudantium mollitia qui voluptates sequi.</p>
					</div>
					<div class="box">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda facere excepturi a voluptatem odio, alias, libero obcaecati ullam! Id quod dignissimos, officiis, facilis voluptate laudantium mollitia qui voluptates sequi.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda facere excepturi a voluptatem odio, alias, libero obcaecati ullam! Id quod dignissimos, officiis, facilis voluptate laudantium mollitia qui voluptates sequi.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda facere excepturi a voluptatem odio, alias, libero obcaecati ullam! Id quod dignissimos, officiis, facilis voluptate laudantium mollitia qui voluptates sequi.</p>
					</div>
				</div>
			</div>
		</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>