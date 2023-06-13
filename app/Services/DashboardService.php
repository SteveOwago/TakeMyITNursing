<?php

namespace App\Services;

use App\Models\Question;
use App\Models\StudentResult;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\PaymentService;
use App\Models\QuestionTestResult;
use App\Models\SubjectCategory;
use App\Models\Test;
use App\Models\TestTrial;
use Stripe\Subscription;

/**
 * Class DashboardService.
 */
class DashboardService
{
    public function getDashboardStatistics()
    {
        // Data will hold the dashboard statistics


        // Define Dashboard Statistics for Student
        $user = User::findOrFail(Auth::id());
        if ($user->hasRole('Student')) {
            $testsTaken = StudentResult::where('user_id', $user->id)->orderBy('id', 'DESC')->whereNotNull('score')->cursor();
            $latestTest = StudentResult::with(['test'])->where('user_id', $user->id)->whereNotNull('score')->latest()->first();
            $totalQuestionsAttempted = [
                'totalQuestions' => $totalQuestions = QuestionTestResult::where('user_id', $user->id)->count(),
                'totalCorrect' => $totalCorrect = QuestionTestResult::where('user_id', $user->id)->where('answer', 'correct')->count(),
                'totalFailed' => $totalQuestions - $totalCorrect,
            ];
            $subscriptionPaymentStatus = new PaymentService();
            $plan = $subscriptionPaymentStatus->getCurrentUserSubscriptionPlan();
            if (!$plan) {
                $subscriptionStatus = 'INACTIVE';
            } else {
                $subscriptionStatus = 'ACTIVE';
            }
            $subscriptionPlan = new PaymentService();
            $subscriptionId = $subscriptionPlan->getStripePlanID();

            $subscriptionPlan = Subscription::retrieve($subscriptionId);
            $currentPeriod_end = null;
            if ($subscriptionPlan) {
                $currentPeriod_end = date('Y-m-d H:i:s', $subscriptionPlan->current_period_end);
            }

            $data = [
                'tests_taken' => $testsTaken ?? null,
                'latest_test' => $latestTest ?? null,
                'total_questions_attempted' => $totalQuestionsAttempted ?? null,
                'subscription_status' => $subscriptionStatus ?? null,
                'subscription_plan' => $plan ?? null,
                'subscription_end_date' => $currentPeriod_end ?? 'Not Subscribed'
            ];
        }


        // Define Statistics for Admin
        if ($user->hasRole('Admin')) {
            $totalStudents = User::role('Student')->count();
            $allStudents = User::with(['subscriptions'])->role('Student')->get();
            //dd($allStudents);
            $questions = Question::count();
            $visitorsTests = TestTrial::count();
            $tests = Test::count();


            $data = [
                'totalStudents' => $totalStudents,
                'students' => $allStudents,
                'totalQuestions' => $questions,
                'totalVisitors' => $visitorsTests,
                'totalTests' => $tests,
            ];
        }

        return $data;
    }

    public function getTestCategories(){
        //Get Student Domain
        $user = User::findOrFail(Auth::id());
        if ($user->hasRole('Student')) {
           $subjectDomain =  $user->subject_domain_id;

           $testCategories = SubjectCategory::with(['tests'])->where('subject_domain_id', $subjectDomain)->inRandomOrder()->take(3)->get();

        }else{
            $testCategories = SubjectCategory::with(['tests'])->cursor();
        }
        return $testCategories;
    }
}
