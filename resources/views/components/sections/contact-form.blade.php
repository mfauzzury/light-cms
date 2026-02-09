@props(['data'])

<section class="py-20 bg-white">
  <div class="w-full">
  <div >
  @if(!empty($data['title']))
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 text-center">
    {{ $data['title'] }}
    </h2>
  @endif

  @if(!empty($data['subtitle']))
    <p class="text-xl text-gray-600 mb-8 text-center">
    {{ $data['subtitle'] }}
    </p>
  @endif

  <form action="{{ $data['action'] ?? '/contact' }}" method="POST" class="space-y-6">
    @csrf

    <div>
    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
    <input type="text" id="name" name="name" required
      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
    </div>

    <div>
    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
    <input type="email" id="email" name="email" required
      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
    </div>

    <div>
    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
    <textarea id="message" name="message" rows="5" required
     class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"></textarea>
    </div>

    <button type="submit"
    class="w-full bg-primary-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-primary-600 transition-all btn-press shadow-soft hover:shadow-soft-lg">
    {{ $data['button_text'] ?? 'Send Message' }}
    </button>
  </form>
  </div>
  </div>
</section>
