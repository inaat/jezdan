
@component('mail::message')
# Welcome to {{ config('app.name') }}!

Dear {{ $user->name }},
{{ $tenant->id }}
Thank you for subscribing to our  package! We are thrilled to have you on board and look forward to supporting your school's administrative needs.

To access your account, please use the following credentials:
URL: {{  $tenant->domain->domain }}
Email: test@gmail.com
Password: 123456789

With our software, you can streamline various tasks such as student enrollment, attendance tracking, grade management, and communication with parents. We are confident that our platform will simplify your school's operations and enhance efficiency.

If you have any questions or need assistance with setting up your account, please don't hesitate to contact our support team at info@jezdan.co . We are here to help you every step of the way.

Once again, welcome to [School Management Software]! We are excited to embark on this journey with you and your school.


 




Thank you for reaching out to us. We have received your message and will get back to you as soon as possible.

If you have any further questions or concerns, feel free to reach out.

@component('mail::button', ['url' => url('/')])
Visit Our Website
@endcomponent

Best regards,

{{ config('app.name') }}
@endcomponent
