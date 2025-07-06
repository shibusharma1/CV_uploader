<?php

namespace App\Models;


use App\Models\ApplicantAddress;
use App\Models\ApplicantDocuments;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
    // class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name_en',
        'name_ne',
        'image',
        'email',
        'phone',
        'password',
        'role',
        'is_active',
    ];

    protected $casts = [
        'phone_verified' => 'boolean',
        'phone_verification_expires_at' => 'datetime',
    ];

    public function sendPhoneOtp()
    {

        $code = rand(100000, 999999);
        $this->phone_verification_code = $code;
        $this->phone_verification_expires_at = now()->addMinutes(10);
        $this->save();

        try {
            Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiODkwYjhiYjE3YzI0MzYwNTU1YThhMDVmNTFiN2M1MzBmNzUyYzljZDBiMzg1ZmJlZjQxNWY3NTJiZTljZTRlN2MzMjI1ODIwOGI5YjcxOTYiLCJpYXQiOjE3MjM1NDY3NDYuODY5MTk3LCJuYmYiOjE3MjM1NDY3NDYuODY5MjAyLCJleHAiOjIwMzkwNzk1NDYuODY0Mzk4LCJzdWIiOiI4MSIsInNjb3BlcyI6W119.d70JimcomBkExRAWTuHGa7qq93qf1x-1MMuhkk0OLTlGvkzk_Lu7hoixul8qpIM0Dj3GceOJihrYHXVmthIP1IdXmMTrYfwCyXOFKuBONZOeuoWhQXVut7nSoSEUxI422tGjDejM6WbW9GPjDTykjuA9oz_mn48s_U44ODpGajNAdVxAX7aR7TKpyPC_8o45s873m_v0GSer1scuBKy3zsuaThZ7QddfQ3GLJ7k0dLyA2vhyjMU8pCH9_-DyirqPssMy6SM7VYbhTLjZwo6CbpkRCYwhiu3mdxqwuRAMTj2mMKdAJMamgbIOn35IvSH_A5wC4cVfBReQsCnypoQXMFftxff76pm9zQa9XvO7rOzCK2EA-tLWXwDZjsR4JYBSgRnjVqqXHN8Zpsiyy5ZpLWYHL5lORYT3EotkGgGxXmyIATd_R5-SjMf1UTECMG-32YSvN5y2gbsl_ANmZMQMC_6AUJfFTsbyug20ilIftnI5GtMFzO9Rw0ZhucwiyFiH91mW7G9VLM6B7-9FoTPwDRkCgw03knOt6dMFvy1u3vXyk-H4M9uqWHwDZWdZfDddLJ6DNhtBcQHv1fHacHYu806-c2HaTYjG4COXIBWj1lQ5NYnULJrWciUdFxfOPuh4q2Jj7fe9lHYXzcpGs_uqrNhZn-PH4Rju3eetPJnRm3M')
                ->post('https://newsms.doit.gov.np/api/sms', [
                    'message' => "विराटनगर महानगरपालिका छात्रवृत्ति प्रणाली आदरणीय आवेदक,तपाईंको एक पटक प्रयोग हुने पासवर्ड (OTP) हो: $code । छात्रवृत्तिको आवेदन प्रक्रिया पुष्टि गर्न कृपया यो कोड प्रयोग गर्नुहोस्। यो कोड अरू कसैसँग पनि साझा नगर्नुहोस्।",
                    "mobile" => $this->phone

                ]);
        } catch (\Exception $e) {
            Log::error('OTP SMS failed: ' . $e->getMessage());

        }
    }

    public function verifyPhoneCode($code)
    {
        if ($this->phone_verification_code !== $code)
            return false;
        if (now()->greaterThan($this->phone_verification_expires_at))
            return false;

        $this->phone_verified = true;
        $this->phone_verification_code = null;
        $this->phone_verification_expires_at = null;
        $this->save();
        return true;
    }

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }
    public function address()
    {
        return $this->hasOne(ApplicantAddress::class, 'user_id');
    }

    public function documents()
    {
        return $this->hasOne(ApplicantDocuments::class, 'user_id');
    }

    public function collegeSelections()
    {
        return $this->belongsToMany(CollegeList::class, 'applicant_college_selections', 'user_id', 'college_id')
            ->withPivot('priority')
            ->withTimestamps();
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
