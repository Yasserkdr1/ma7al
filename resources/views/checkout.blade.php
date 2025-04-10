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
      <form name="" id="vt" action="{{route('cart.place.order')}}" method="POST">
        @csrf
        @method('POST')
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

<!-- Détails du paiement Stripe -->
<div id="card-element"></div> <!-- Le champ pour la carte de crédit -->
    <div id="card-errors" role="alert"></div> <!-- Affichage des erreurs -->

             <input type="hidden" name="stripeToken" id="ok">
              <button class="btn btn-primary btn-checkout place-order-button" id="ok">PLACE ORDER</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
  @php
    $categories = \App\Models\Category::all();
@endphp
@endsection
@push('scripts')
<!-- Assurez-vous d'inclure le SDK Stripe -->
<script src="https://js.stripe.com/v3/"></script>

<script>
     document.addEventListener("DOMContentLoaded", function () {
    const stripe = Stripe('pk_test_51RAILD4FblrsMg7lgsuvMMyNauZIlBmexBr5fkLgdXJ0jdoY7ZgSB5BENSaqVxMEUFUkJkAfSJGGft4HbPaj2zOc00c8fN9RwJ');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const inputToken = document.getElementById('ok');
    const errorDiv = document.getElementById('card-errors');

  

    
    async function handleTokenCreation() {
        
        try {
            const {token, error} = await stripe.createToken(card); 
           

            if (error) {
                
                console.error("Erreur lors de la création du token:", error);
                errorDiv.textContent = error.message;
            } else {
                inputToken.value = token.id; 
               
            }
        } catch (e) {
            console.error("Erreur lors de la création du token:", e);
        }
    }

   
    handleTokenCreation();
});

</script>


@endpush