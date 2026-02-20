<x-filament-panels::page>
    <div class="prose max-w-none dark:prose-invert">
        <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8 rounded-r-lg">
            <h2 class="text-2xl font-bold text-blue-900 mt-0 mb-3">📚 Page Creation Guide</h2>
            <p class="text-blue-800 mb-0">This guide covers two methods for creating pages in Light-CMS: <strong>Editor.js Blocks</strong> (traditional content editing) and <strong>JSON Templates</strong> (AI-powered landing pages).</p>
        </div>

        <!-- Method 1: Editor.js Blocks -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center">
                <span class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center mr-3">1</span>
                Method 1: Editor.js Blocks (Traditional)
            </h2>

            <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-3">✨ Best for:</h3>
                <ul class="list-disc pl-6 space-y-2 text-gray-700">
                    <li>Blog posts and articles</li>
                    <li>News updates</li>
                    <li>Documentation pages</li>
                    <li>Any content that needs free-form text editing</li>
                </ul>
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-3">📝 Step-by-Step:</h3>
            <ol class="list-decimal pl-6 space-y-4 text-gray-700">
                <li>
                    <strong>Navigate to Pages</strong><br>
                    Click "Pages" in the sidebar navigation.
                </li>
                <li>
                    <strong>Create New Page</strong><br>
                    Click the "New Page" button in the top-right corner.
                </li>
                <li>
                    <strong>Fill Basic Details</strong>
                    <ul class="list-disc pl-6 mt-2 space-y-1">
                        <li><strong>Title:</strong> Enter your page title (e.g., "About Us")</li>
                        <li><strong>Slug:</strong> Auto-generated from title (e.g., "about-us")</li>
                        <li><strong>Status:</strong> Select "Draft" or "Published"</li>
                        <li><strong>Published At:</strong> Set publish date/time (leave blank for immediate)</li>
                    </ul>
                </li>
                <li>
                    <strong>Template Selection</strong><br>
                    In the "Template (Optional)" section, keep the default <code class="bg-gray-100 px-2 py-1 rounded">No Template (Use Editor.js)</code>.
                </li>
                <li>
                    <strong>Use Content Editor</strong><br>
                    The "Content Editor" section will appear. Click inside the editor area to start adding blocks.
                </li>
                <li>
                    <strong>Add Content Blocks</strong><br>
                    Click the <code class="bg-gray-100 px-2 py-1 rounded">+</code> button to add different block types:
                    <ul class="list-disc pl-6 mt-2 space-y-1">
                        <li><strong>Paragraph:</strong> Regular text content</li>
                        <li><strong>Header:</strong> H1-H6 headings</li>
                        <li><strong>List:</strong> Ordered or unordered lists</li>
                        <li><strong>Image:</strong> Upload images (drag & drop or select file)</li>
                        <li><strong>Quote:</strong> Blockquotes with citations</li>
                        <li><strong>Code:</strong> Syntax-highlighted code blocks</li>
                        <li><strong>Table:</strong> Data tables</li>
                        <li><strong>Embed:</strong> YouTube, Twitter, etc.</li>
                    </ul>
                </li>
                <li>
                    <strong>Upload Featured Image (Optional)</strong><br>
                    Scroll to the "Featured Image" section and upload a hero image for your page.
                </li>
                <li>
                    <strong>Configure SEO (Optional)</strong><br>
                    Fill in SEO fields:
                    <ul class="list-disc pl-6 mt-2 space-y-1">
                        <li><strong>Meta Title:</strong> SEO-optimized title (60 chars max)</li>
                        <li><strong>Meta Description:</strong> SEO description (160 chars max)</li>
                        <li><strong>Canonical URL:</strong> Preferred URL for search engines</li>
                        <li><strong>Open Graph fields:</strong> For social media sharing</li>
                    </ul>
                </li>
                <li>
                    <strong>Save</strong><br>
                    Click the <code class="bg-blue-600 text-white px-3 py-1 rounded">Create</code> button to save your page.
                </li>
                <li>
                    <strong>Preview</strong><br>
                    After saving, click the eye icon to preview your page on the frontend.
                </li>
            </ol>

            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mt-6">
                <p class="text-yellow-800 font-semibold mb-2">💡 Pro Tips:</p>
                <ul class="list-disc pl-6 space-y-1 text-yellow-700">
                    <li>Use Tab/Shift+Tab to navigate between blocks</li>
                    <li>Drag the handle icon (⋮⋮) to reorder blocks</li>
                    <li>Press Backspace on an empty block to delete it</li>
                    <li>Images are automatically optimized and resized</li>
                </ul>
            </div>
        </div>

        <!-- Method 2: JSON Templates -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center">
                <span class="bg-purple-600 text-white w-10 h-10 rounded-full flex items-center justify-center mr-3">2</span>
                Method 2: JSON Templates (AI-Powered)
            </h2>

            <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-3">✨ Best for:</h3>
                <ul class="list-disc pl-6 space-y-2 text-gray-700">
                    <li>Marketing landing pages</li>
                    <li>Product pages</li>
                    <li>Service pages</li>
                    <li>About/Contact pages with structured sections</li>
                    <li>Quick page creation with AI assistance</li>
                </ul>
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-3">🤖 AI-Assisted Workflow:</h3>
            <ol class="list-decimal pl-6 space-y-4 text-gray-700">
                <li>
                    <strong>Ask Claude to Generate JSON</strong><br>
                    Example prompt:
                    <div class="bg-gray-800 text-gray-100 p-4 rounded-lg mt-2 font-mono text-sm">
                        "Create a landing page for a SaaS analytics product with hero, features, pricing, and testimonials"
                    </div>
                    Claude will generate a complete JSON structure with all sections and sample content.
                </li>
                <li>
                    <strong>Copy the JSON</strong><br>
                    Copy the entire JSON output from Claude (including the curly braces).
                </li>
                <li>
                    <strong>Create New Page</strong><br>
                    In Filament admin, click "Pages" → "New Page".
                </li>
                <li>
                    <strong>Fill Basic Details</strong>
                    <ul class="list-disc pl-6 mt-2 space-y-1">
                        <li><strong>Title:</strong> Your page title</li>
                        <li><strong>Status:</strong> Select "Published" or "Draft"</li>
                    </ul>
                </li>
                <li>
                    <strong>Select Template</strong><br>
                    In "Template (Optional)" section, choose a template:
                    <ul class="list-disc pl-6 mt-2 space-y-1">
                        <li><strong>Landing Page:</strong> Hero, features, pricing, testimonials, CTA</li>
                        <li><strong>About Page:</strong> Hero, stats, team, CTA</li>
                        <li><strong>Contact Page:</strong> Hero, contact form</li>
                        <li><strong>Services Page:</strong> Hero, features, CTA</li>
                    </ul>
                </li>
                <li>
                    <strong>Paste JSON</strong><br>
                    The "Template Data (JSON)" field will appear. Paste your JSON structure here.
                    <div class="bg-gray-50 border border-gray-300 p-3 rounded mt-2 text-sm">
                        The editor will auto-format the JSON with syntax highlighting in dark mode.
                    </div>
                </li>
                <li>
                    <strong>Save</strong><br>
                    Click <code class="bg-blue-600 text-white px-3 py-1 rounded">Create</code>. The JSON will be validated automatically.
                </li>
                <li>
                    <strong>Preview</strong><br>
                    Click the eye icon to see your fully-designed landing page!
                </li>
            </ol>

            <div class="bg-green-50 border-l-4 border-green-500 p-4 mt-6">
                <p class="text-green-800 font-semibold mb-2">✅ Advantages:</p>
                <ul class="list-disc pl-6 space-y-1 text-green-700">
                    <li>Create beautiful landing pages in seconds</li>
                    <li>No design skills required - AI handles the layout</li>
                    <li>Consistent, professional design patterns</li>
                    <li>Easy to iterate - just regenerate JSON and paste</li>
                    <li>Mobile-responsive by default</li>
                </ul>
            </div>
        </div>

        <!-- Available Section Types -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">🧩 Available Section Types</h2>
            <p class="text-gray-700 mb-6">When using JSON templates, you can include these section types:</p>

            <div class="grid md:grid-cols-2 gap-4">
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">🦸 Hero</h3>
                    <p class="text-sm text-gray-600">Large header section with title, subtitle, buttons, and optional image. Perfect for page intros.</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">⚡ Features</h3>
                    <p class="text-sm text-gray-600">Grid of features with icons, titles, and descriptions. Showcases product benefits.</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">💰 Pricing</h3>
                    <p class="text-sm text-gray-600">Pricing table with plans, features, and call-to-action buttons. Highlights featured plan.</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">💬 Testimonials</h3>
                    <p class="text-sm text-gray-600">Customer testimonials with avatars, names, roles, quotes, and star ratings.</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">📣 CTA (Call to Action)</h3>
                    <p class="text-sm text-gray-600">Bold banner with contrasting background to drive action. Includes title and buttons.</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">👥 Team</h3>
                    <p class="text-sm text-gray-600">Team member grid with photos, names, roles, and bios. Great for About pages.</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">📊 Stats</h3>
                    <p class="text-sm text-gray-600">Impressive statistics display with large numbers and labels. Shows achievements.</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">📧 Contact Form</h3>
                    <p class="text-sm text-gray-600">Contact form with name, email, and message fields. Styled consistently.</p>
                </div>
            </div>
        </div>

        <!-- Comparison Table -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">⚖️ Method Comparison</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left font-semibold">Aspect</th>
                            <th class="border border-gray-300 px-4 py-2 text-left font-semibold">Editor.js Blocks</th>
                            <th class="border border-gray-300 px-4 py-2 text-left font-semibold">JSON Templates</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 font-medium">Best Use Case</td>
                            <td class="border border-gray-300 px-4 py-2">Blog posts, articles, docs</td>
                            <td class="border border-gray-300 px-4 py-2">Landing pages, marketing pages</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 font-medium">Creation Speed</td>
                            <td class="border border-gray-300 px-4 py-2">Moderate (manual editing)</td>
                            <td class="border border-gray-300 px-4 py-2">Fast (AI-generated)</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 font-medium">Flexibility</td>
                            <td class="border border-gray-300 px-4 py-2">High (any content structure)</td>
                            <td class="border border-gray-300 px-4 py-2">Medium (predefined sections)</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 font-medium">Design Quality</td>
                            <td class="border border-gray-300 px-4 py-2">Good (content-focused)</td>
                            <td class="border border-gray-300 px-4 py-2">Excellent (marketing-focused)</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 font-medium">Learning Curve</td>
                            <td class="border border-gray-300 px-4 py-2">Easy (intuitive editor)</td>
                            <td class="border border-gray-300 px-4 py-2">Very easy (paste JSON)</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 font-medium">AI Assistance</td>
                            <td class="border border-gray-300 px-4 py-2">No</td>
                            <td class="border border-gray-300 px-4 py-2">Yes (full generation)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Example JSON -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">📄 Example JSON Structure</h2>
            <p class="text-gray-700 mb-4">Here's a simple landing page JSON you can use as a starting point:</p>
            <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto text-sm"><code>{
  "sections": [
    {
      "type": "hero",
      "data": {
        "title": "Welcome to Our Product",
        "subtitle": "The best solution for your needs",
        "buttons": [
          {"text": "Get Started", "url": "/signup", "primary": true},
          {"text": "Learn More", "url": "/about", "primary": false}
        ]
      }
    },
    {
      "type": "features",
      "data": {
        "title": "Why Choose Us",
        "items": [
          {
            "icon": "🚀",
            "title": "Fast",
            "description": "Lightning-fast performance"
          },
          {
            "icon": "🔒",
            "title": "Secure",
            "description": "Enterprise-grade security"
          },
          {
            "icon": "💡",
            "title": "Smart",
            "description": "AI-powered features"
          }
        ]
      }
    },
    {
      "type": "cta",
      "data": {
        "title": "Ready to get started?",
        "buttons": [
          {"text": "Start Free Trial", "url": "/signup", "primary": true}
        ]
      }
    }
  ]
}</code></pre>
        </div>

        <!-- Troubleshooting -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">🔧 Troubleshooting</h2>

            <div class="space-y-4">
                <div class="border-l-4 border-red-500 bg-red-50 p-4">
                    <h3 class="font-bold text-red-900 mb-2">Error: "Field 'content_json' doesn't have a default value"</h3>
                    <p class="text-red-800 text-sm">This error should not occur anymore. If it does, ensure you've run all database migrations. When using templates, content_json is nullable.</p>
                </div>

                <div class="border-l-4 border-yellow-500 bg-yellow-50 p-4">
                    <h3 class="font-bold text-yellow-900 mb-2">JSON Validation Failed</h3>
                    <p class="text-yellow-800 text-sm">Check that your JSON is properly formatted. Missing commas, extra commas, or unclosed brackets will cause validation errors. Use a JSON validator online if needed.</p>
                </div>

                <div class="border-l-4 border-blue-500 bg-blue-50 p-4">
                    <h3 class="font-bold text-blue-900 mb-2">Section Not Rendering</h3>
                    <p class="text-blue-800 text-sm">Ensure the section "type" matches one of the 8 available types exactly (hero, features, pricing, testimonials, cta, team, stats, contact-form). Types are case-sensitive.</p>
                </div>

                <div class="border-l-4 border-green-500 bg-green-50 p-4">
                    <h3 class="font-bold text-green-900 mb-2">Images Not Showing</h3>
                    <p class="text-green-800 text-sm">For template images, use full URLs (https://...) or upload images via Media Library first and use the generated URL.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-100 border-t-4 border-blue-600 p-6 rounded-lg">
            <h3 class="font-bold text-gray-900 mb-2">Need More Help?</h3>
            <p class="text-gray-700 mb-4">If you have questions or need assistance, you can:</p>
            <ul class="list-disc pl-6 space-y-1 text-gray-700">
                <li>Ask Claude AI to generate specific JSON structures for your needs</li>
                <li>Experiment with both methods to see which works best for your content</li>
                <li>Review existing pages to see how they were built</li>
            </ul>
            <p class="text-sm text-gray-600 mt-4 italic">Light-CMS version 1.1 • Component-Based Template System</p>
        </div>
    </div>
</x-filament-panels::page>
