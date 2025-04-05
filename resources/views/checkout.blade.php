@extends('layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Shipping and Checkout</h2>
      <div class="checkout-steps">
        <a href="{{route('cart.index')}}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Shipping and Checkout</span>
            <em>Checkout Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
          </span>
        </a>
      </div>
      <form name="checkout-form" action="{{route('cart.place.order')}}" method="POST">
        @csrf
        <div class="checkout-form">
          <div class="billing-info__wrapper">
            <div class="row">
              <div class="col-6">
                <h4>SHIPPING DETAILS</h4>
              </div>
              <div class="col-6">
              </div>
            </div>
            @if($adresse)
              <div class="row">
                <div class="col-md-12">
                  <div class="my-account__address-list">
                    <div class="my-account__address-list-item">
                      <div class="my-account__address_item__detail">
                        <p>{{$adresse->name}}</p>
                        <p>{{$adresse->address}}</p>
                        <p>{{$adresse->landmark}}</p>
                        <p>{{$adresse->city}},{{$adresse->state}},{{$adresse->country}}</p>
                        <p>{{$adresse->zip}}</p>
                        <br>
                        <p>{{$adresse->phone}}</p>
                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>





            @else
            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="name" required="" value="{{old('name')}}">
                  <label for="name">Full Name *</label>
                  @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="phone" required="" value="{{old('phone')}}">
                  <label for="phone">Phone Number *</label>
                  @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="zip" required="" value="{{old('zip')}}">
                  <label for="zip">Pincode *</label>
                  @error('zip') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mt-3 mb-3">
                  <input type="text" class="form-control" name="state" required="" value="{{old('state')}}">
                  <label for="state">State *</label>
                  @error('state') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="city" required="" value="{{old('city')}}">
                  <label for="city">Town / City *</label>
                  @error('city') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="address" required="" value="{{old('address')}}">
                  <label for="address">House no, Building Name *</label>
                  @error('address') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="locality" required="" value="{{old('locality')}}">
                  <label for="locality">Road Name, Area, Colony *</label>
                  @error('locality') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="landmark" required="" value="{{old('landmark')}}">
                  <label for="landmark">Landmark *</label>
                  @error('landmark') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
            </div>
            @endif
          </div>
          <div class="checkout__totals-wrapper">
            <div class="sticky-content">
              <div class="checkout__totals">
                <h3>Your Order</h3>
                <table class="checkout-cart-items">
                  <thead>
                    <tr>
                      <th>PRODUCT</th>
                      <th align="right">SUBTOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(Cart::instance('cart') as $item)
                    <tr>
                      <td>
                        {{$item->name}} x {{$item->qty}}
                      </td>
                      <td align="right">
                        {{$item->subTotal()}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <table class="checkout-totals">
                  <tbody>
                    <tr>
                      <th>SUBTOTAL</th>
                      <td class="text-right">{{Cart::instance('cart')->subTotal()}}</td>
                    </tr>
                    <tr>
                      <th>SHIPPING</th>
                      <td class="text-right">Free shipping</td>
                    </tr>
                    <tr>
                      <th>VAT</th>
                      <td class="text-right">{{Cart::instance('cart')->tax()}}</td>
                    </tr>
                    <tr>
                      <th>TOTAL</th>
                      <td class="text-right">{{Cart::instance('cart')->total()}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="checkout__payment-methods">
  <div class="form-check">
    <input class="form-check-input" type="radio" name="mode" id="mode1" value="card">
    <label class="form-check-label" for="mode1">
      Debit or Credit Card
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="mode" id="mode2" value="paypal">
    <label class="form-check-label" for="mode2">
      Paypal
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="mode" id="mode3"  value="cod">
    <label class="form-check-label" for="mode3">
      Cash on delivery
    </label>
  </div>
  <div class="policy-text">
    Your personal data will be used to process your order, support your experience throughout this
    website, and for other purposes described in our <a href="terms.html" target="_blank">privacy policy</a>.
  </div>
</div>

<!-- Bloc pour saisir les informations de carte via Stripe Elements -->
<div id="stripe-card-section" style="display:none; margin-top:20px;">
  <label for="card-element">Informations de la carte</label>
  <div id="card-element" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></div>
  <div id="card-errors" role="alert" style="color: red; margin-top:10px;"></div>
  <!-- Champ caché pour recevoir le token Stripe -->
  <input type="hidden" name="stripeToken" id="stripeToken">
</div>


              <button class="btn btn-primary btn-checkout">PLACE ORDER</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
@endsection
@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
  // Fonction pour afficher ou masquer le bloc de paiement par carte
  document.addEventListener('DOMContentLoaded', function() {
    const modeRadios = document.getElementsByName('mode');
    const stripeSection = document.getElementById('stripe-card-section');

    modeRadios.forEach(function(radio) {
      radio.addEventListener('change', function() {
        if (this.value === 'card') {
          stripeSection.style.display = 'block';
        } else {
          stripeSection.style.display = 'none';
        }
      });
    });
  });

  // Initialisation de Stripe Elements
  const stripe = Stripe("{{ env('STRIPE_KEY') }}"); // Ta clé publique Stripe
  const elements = stripe.elements();
  const cardElement = elements.create('card');
  cardElement.mount('#card-element');

  // Gestion de la création du token lors de la soumission du formulaire
  const checkoutForm = document.forms['checkout-form'];
  checkoutForm.addEventListener('submit', async function(e) {
    // Si l'utilisateur a sélectionné 'card', générer le token Stripe
    if(document.querySelector('input[name="mode"]:checked').value === 'card') {
      e.preventDefault();
      const { token, error } = await stripe.createToken(cardElement);
      if (error) {
        document.getElementById('card-errors').textContent = error.message;
      } else {
        // Injecter le token dans le formulaire et soumettre
        document.getElementById('stripeToken').value = token.id;
        checkoutForm.submit();
      }
    }
  });
</script>

@endpush