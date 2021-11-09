<h1>Customers</h1>

<a href="/customers/create">Add New Customer</a>

@forelse($customers as $customer)
    <p><strong>{{ $customer->name }}</strong> {{ $customer->email }}</p>
@empty
    <p>No Customers to show</p>
@endforelse

