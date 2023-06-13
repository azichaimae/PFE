{{-- Hero --}}
<div class="hero-section">
    <div id="video-container">
        <video src="{{asset('images/inv.mp4')}}" autoplay loop muted></video>
        <div class="quote-overlay">
            <p>Reducing waste, empowering change.</p>
        </div>
    </div>
</div>
{{-- End Hero --}}
<br>
{{-- Environment --}}
<div class="containerEnv">
    <div class="card-group vgr-cards">
        <div class="card" style="padding:40px; margin:10px 0 10px 0">
            <div class="card-img-body">
                <img class="card-img" src="{{asset('images/girl.gif')}}" alt="Card image cap">
            </div>
            <div class="card-body" id="content">
                <h3 class="card-title" style="font-weight:bold">Is the environment important to me?</h3>
                <p class="card-text">The environment is of utmost importance as it sustains life on our planet, providing clean air, water, and diverse ecosystems. Living in harmony with nature and protecting it from our harmful behavior is crucial for a sustainable future.We can achieve this by adopting environmentally friendly practices in our daily lives, such as conserving energy, reducing waste, and supporting conservation efforts. Additionally, raising awareness, advocating for sustainable policies, and holding industries accountable are essential steps towards protecting the environment and ensuring a healthier planet for future generations.</p>
                <p class="card-text" id="full-content">Let us embrace our responsibility as stewards of the environment and take action to preserve and nurture it.
                    Living in harmony with the environment involves adopting environmentally friendly practices in our daily lives. We can start by reducing our carbon footprint through actions such as conserving energy, using public transportation, or choosing sustainable modes of travel.
                    Recycling and reducing waste can significantly minimize the strain on natural resources and prevent pollution. Conserving water, planting trees, and supporting wildlife conservation efforts are also impactful ways to protect the environment. <br>
                    <br>
                    Additionally, raising awareness about environmental issues and advocating for sustainable practices can inspire positive change at a broader level. Education and community involvement play vital roles in fostering a sense of responsibility towards the environment. By promoting environmental awareness and actively participating in conservation initiatives, we can create a ripple effect and inspire others to take action.
                    Living in harmony with the environment goes beyond individual actions; it requires systemic changes and policy interventions. Supporting environmentally conscious policies, advocating for renewable energy sources, and holding industries accountable for their environmental impact can drive significant progress in protecting our planet. <br>
                    <br>

                    In conclusion, the environment is invaluable, and our actions have far-reaching consequences. By living in harmony with nature and adopting sustainable practices, we can mitigate the damage caused by our behavior and ensure a healthier, more sustainable future for generations to come. Let us strive to be responsible stewards of the environment, fostering a deep respect for nature and taking action to protect it.</p>
                    <br>
                <button class="btn btn-outline-primary" id="toggle-button" onclick="toggleContent()">Read More</button>
            </div>
        </div>
    </div>
</div>
<br>
{{-- End Environment --}}
<section class="product">
    <h2 class="product-category">best selling</h2>
</section>
{{--  inside product section. --}}
<div class="product-container" style="font-family: 'Roboto', sans-serif;">
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j1.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j2.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j3.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j4.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j5.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j6.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j7.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j8.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j9.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j10.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">50% off</span>
            <img src="{{asset('images/j11.jpg')}}" class="product-thumb" alt="">
            <button class="card-btn">add to whislist</button>
        </div>
        <div class="product-info">
            <h2 class="product-brand">brand</h2>
            <p class="product-short-des">a short line about the juice..</p>
            <span class="price">$20</span><span class="actual-price">$40</span>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>

