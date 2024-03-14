<?php
	session_start();
	include "connect.php";

	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";

	$sql = "SELECT * FROM `products` WHERE  `product_id` < 502 ORDER BY `created_at` DESC";
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

	$data = "";
	while($row = $result->fetch_assoc())
		$data .= sprintf('
			<div class="col">
				<img src="%s"  alt="Тур" title="Изображение тура">
				<div class="rowt" style=" display: flex;
				flex-direction:column;">
					<p><a href="product.php?name=%s">%s</a></p>
					<h4>от %s p.</h4>
					<input type="hidden" value="%s" name="name">
					
				</div>
				%s
				
			</div>
		', $row["image"], $row["name"], $row["name"], $row["price"],$row["name"], 
		($role == "admin") ? '
			<div class="row">
				<p><a href="update.php?name='.$row["name"].'" class="text-small">Редактировать</a></p>
				<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="asset/controllers/delete_product.php?id='.$row["name"].'" class="text-small">Удалить</a></p>
			</div>
		' : '');

	if($data == "")
		$data = '<h3 class="text-center">Товары отсутствуют</h3>';

	
?><!--подключение-->
<!--общий контейнер--> 

<div class="banner"><?php
include "header.php"; ?>
            <div class="ban-text">
                <p>Откройте для себя свою жизнь, путешествуйте, куда хотите
</p>
<h5>Хотите исследовать райскую природу в мире, давайте найдем лучшее место назначения в мире вместе с нами.</h5>
            </div>
        </div>

 <!-- баннер -->


		



<div class="container"><!--Общий контейнер сайта-->
    
	 
			<div class="headline">
				<h1>Специальные предложения</h1>
			
			</div>

			<div class="row" id="products">
				<?= $data ?>
			
			</div>

		</div>
	<div class="information"><!--блок информации о компании-->
	
		<div class="information__photo">
			<img src="asset/img/in.svg" alt="">
		</div>
		<div class="information__text">
			<h1>Путешествуйте с нами в любой уголок мира</h1>
			<p>Хотели бы вы исследовать природный рай в мире, давайте найдем лучшее место в мире вместе с нами, Хотели бы вы исследовать природный рай в мире, давайте найдем лучшее место в мире вместе с нами. Хотели бы вы исследовать природный рай в мире, давайте найдем лучшее место в мире вместе с нами.
	
	Хотите исследовать райскую природу в мире, давайте найдем лучшее место назначения в мире вместе с нами.</p>
	<button>Свяжитесь с нами</button>
		</div></div><!--конец блока с информацией о компании-->
		<div class="zag1"><h1>Рекомендуемые места</h1></div>
		<div class="container_1">
			<div class="carousel">
				<div class="carousel-window">
					<div class="carousel-slides">
						<div class="carousel-item">
						<div class="row-cart">
					<div class="img"><img src="asset/img/111.png" alt="">

				</div>
				<div class="inf">
					<div class="type"><h5>Релакс</h5></div> <div class="day-night"><p>3 дня, 3 ночи</p></div>
				</div>
				<div class="names"><h3>Черное море</h3></div>
				<div class="buybuy">
					<p>700$/чел.</p>
					<button><a href="catalog.php">Смотреть</a></button>
				</div>
						</div></div>
						<div class="carousel-item">
						<div class="row-cart">
					<div class="img"><img src="asset/img/222.png" alt="">

				</div>
				<div class="inf">
					<div class="type"><h5>Приключения</h5></div> <div class="day-night"><p>4 дня, 3 ночи</p></div>
				</div>
				<div class="names"><h3>Норвегия</h3></div>
				<div class="buybuy">
					<p>400$/чел.</p>
					<button><a href="catalog.php">Смотреть</a></button>
				</div>
						</div></div>
						<div class="carousel-item">
						<div class="row-cart">
					<div class="img"><img src="asset/img/333.png" alt="">

				</div>
				<div class="inf">
					<div class="type"><h5>Релакс</h5></div> <div class="day-night"><p>7 дня, 6 ночи</p></div>
				</div>
				<div class="names"><h3>Дагестан</h3></div>
				<div class="buybuy">
					<p>340$/чел.</p>
					<button><a href="catalog.php">Смотреть</a></button>
				</div>
						</div></div>
						<div class="carousel-item">
						<div class="row-cart">
					<div class="img"><img src="asset/img/111.png" alt="">

				</div>
				<div class="inf">
					<div class="type"><h5>Релакс</h5></div> <div class="day-night"><p>6 дня, 6 ночи</p></div>
				</div>
				<div class="names"><h3>Черное море</h3></div>
				<div class="buybuy">
					<p>700$/чел.</p>
					<button><a href="catalog.php">Смотреть</a></button>
				</div>
						</div></div>
						<div class="carousel-item">
						<div class="row-cart">
					<div class="img"><img src="asset/img/222.png" alt="">

				</div>
				<div class="inf">
					<div class="type"><h5>Приключения</h5></div> <div class="day-night"><p>8 дня, 7 ночи</p></div>
				</div>
				<div class="names"><h3>Дагестан</h3></div>
				<div class="buybuy">
					<p>440$/чел.</p>
					<button><a href="catalog.php">Смотреть</a></button>
				</div>
						</div></div>
						
				</div>
				<a href="#" class="carousel-prev">
					<span class="carousel-prev-icon">&lt;</span>
				</a>
				<a href="#" class="carousel-next">
					<span class="carousel-next-icon">&gt;</span>
				</a>
			</div>
		</div>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				// здесь будем создавать экземпляр js-класса слайдера
			});
		</script>
		<script >
	class Slider {
		constructor(slider, {autoplay = true, inFrame = 1, offset = 1} = {}) {
			// элемент div.carousel
			this.slider = slider;
			// кол-во элементов в одном кадре
			this.inFrame = inFrame;
			// на сколько элементов смещать
			this.offset = offset;
	
			// все элементы слайдера
			this.allItems = slider.querySelectorAll('.carousel-item');
			// сколько всего элементов
			this.itemCount = this.allItems.length;
	
			// все кадры слайдера
			this.allFrames = this.frames();
			// сколько всего кадров
			this.frameCount = this.allFrames.length;
			// индекс кадра в окне просмотра
			this.frameIndex = 0;
	
			// контейнер для элементов
			this.wrapper = slider.querySelector('.carousel-slides');
			// кнопка «вперед»
			this.nextButton = slider.querySelector('.carousel-next');
			// кнопка «назад»
			this.prevButton = slider.querySelector('.carousel-prev');
	
			this.autoplay = autoplay; // включить автоматическую прокрутку?
			this.paused = null; // чтобы можно было выключать автопрокрутку
	
			this.init(); // инициализация слайдера
		}
	
		init() {
			this.dotButtons = this.dots(); // создать индикатор текущего кадра
	
			// если всего 10 элементов, то ширина одного элемента составляет 1/10
			// ширины контейнера .carousel-slides, то есть 100/10 = 10%
			this.allItems.forEach(item => item.style.width = 70 / this.itemCount + '%');
			// ширина контейнера должна вмещать все элементы: если элементов 10,
			// в окне просмотра 3 элемента, тогда ширина контейнера равна ширине
			// трех окон просмотра (300%) плюс ширина одного элемента 33.33333%,
			let wrapperWidth = this.itemCount / this.inFrame * 60;
			this.wrapper.style.width = wrapperWidth + '%';
	
			this.nextButton.addEventListener('click', event => { // клик по кнопке «вперед»
				event.preventDefault();
				this.next();
			});
	
			this.prevButton.addEventListener('click', event => { // клик по кнопке «назад»
				event.preventDefault();
				this.prev();
			});
	
			// клики по кнопкам индикатора текущего кадра
			this.dotButtons.forEach(dot => {
				dot.addEventListener('click', event => {
					event.preventDefault();
					const frameIndex = this.dotButtons.indexOf(event.target);
					if (frameIndex === this.frameIndex) return;
					this.goto(frameIndex);
				});
			});
	
			if (this.autoplay) { // включить автоматическую прокрутку?
				this.play();
				// когда мышь над слайдером — останавливаем автоматическую прокрутку
				this.slider.addEventListener('mouseenter', () => clearInterval(this.paused));
				// когда мышь покидает пределы слайдера — опять запускаем прокрутку
				this.slider.addEventListener('mouseleave', () => this.play());
			}
		}
	
		// перейти к кадру с индексом index
		goto(index) {
			if (index > this.frameCount - 1) {
				this.frameIndex = 0;
			} else if (index < 0) {
				this.frameIndex = this.frameCount - 1;
			} else {
				this.frameIndex = index;
			}
			// ...и выполнить смещение
			this.move();
		}
	
		// перейти к следующему кадру
		next() {
			this.goto(this.frameIndex + 1);
		}
	
		// перейти к предыдущему кадру
		prev() {
			this.goto(this.frameIndex - 1);
		}
	
		// рассчитать и выполнить смещение
		move() {
			// на сколько нужно сместить, чтобы нужный кадр попал в окно
			const offset = 100 / this.itemCount * this.allFrames[this.frameIndex];
			this.wrapper.style.transform = `translateX(-${offset}%)`;
			this.dotButtons.forEach(dot => dot.classList.remove('active'));
			this.dotButtons[this.frameIndex].classList.add('active');
		}
	
		// запустить автоматическую прокрутку
		play() {
			this.paused = setInterval(() => this.next(), 6000);
		}
	
		// создать индикатор текущего кадра
		dots() {
			const ol = document.createElement('ol');
			ol.classList.add('carousel-indicators');
			const children = [];
			for (let i = 0; i < this.frameCount; i++) {
				let li = document.createElement('li');
				if (i === 0) li.classList.add('active');
				ol.append(li);
				children.push(li);
			}
			this.slider.prepend(ol);
			return children;
		}
	
		// индекс первого элемента каждого кадра
		frames() {
			// все наборы элементов, которые потенциально могут быть кадрами
			let temp = [];
			for (let i = 0; i < this.itemCount; i++) {
				// этот набор из this.inFrame элементов без пустого места
				if (this.allItems[i + this.inFrame - 1] !== undefined) {
					temp.push(i);
				}
			}
			// с учетом того, что смещение this.offset может быть больше 1,
			// реальных кадров будет меньше или столько же
			let allFrames = [];
			for (let i = 0; i < temp.length; i = i + this.offset) {
				allFrames.push(temp[i]);
			}
			// в конце могут быть элементы, которые не могут образовать целый кадр (без пустоты),
			// такой кадр вообще не попадает в окно просмотра; вместо него показываем последний
			// целый кадр из числа потенциальных; при этом смещение будет меньше this.offset
			if (allFrames[allFrames.length - 1] !== temp[temp.length - 1]) {
				allFrames.push(temp[temp.length - 1]);
			}
			return allFrames;
		}
	}</script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			new Slider(document.querySelector('.carousel'), {
				inFrame: 2, // два элемента в кадре
				offset: 1, // смещать на один элемент
			});
		});
	</script>
	<?php
		include "footer.php";

		?>
	</div>
<!--подключение к футеру-->
		
	
