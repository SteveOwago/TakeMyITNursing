<?php

namespace App\Services;

/**
 * Class SubjectDomainService.
 */
class SubjectDomainService
{
    public function getUserSubjectDomain(){
        $subjectDomain = auth()->user()->subject_domain_id;
        if (!$subjectDomain) {
            $subjectDomain = 1;
        }
        return $subjectDomain;
    }

}
