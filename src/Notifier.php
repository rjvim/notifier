<?php

namespace Betalectic\Notifier;

use Illuminate\Pagination\Paginator;
use Betalectic\Notifer\Http\Resources\Notifier as NotifierResource;

use Betalectic\Notifer\Models\NotifierJob;
use Betalectic\Notifer\Models\NotifierTemplate;


class Notifier
{
  
    public function __construct()
	{

	}

    public function addJob($job_identifier, $description)
    {

        $job = NotifierJob::firstOrCreate([
                    'job_identifier' => $job_identifier,
                ]);

        $job->description = $description;

        $job->save();

        return $job;
    }


    public function removeJob($job_identifier)
    {

        $job = NotifierJob::where('job_identifier',$job_identifier)->first();

        $job->delete();

        return true;

    }

    public function disableJob($job_identifier)
    {

        $job = NotifierJob::where('job_identifier',$job_identifier)->first();

        $job->disabled = true;

        $job->save();

        return true;
        
    }


    public function enableJob($job_identifier)
    {

        $job = NotifierJob::where('job_identifier',$job_identifier)->first();

        $job->disabled = false;

        $job->save();

        return true;
    }

    public function addTemplate($job_identifier,$type,$content_data)
    {

        $job = NotifierJob::where('job_identifier',$job_identifier)->first();

        $notifier_template = NotifierTemplate::firstOrCreate([
                    'job_identifier_id' => $job->id,
                    'type' => $type
                ]);

        $notifier_template->content = json_encode($content_data);
        $notifier_template->save();

        return $notifier_template;
    }


    public function removeTemplate($job_identifier,$type)
    {

        $job = NotifierJob::where('job_identifier',$job_identifier)->first();

        $notifier_template = NotifierTemplate::where('job_identifier_id',$job->id)
                                    ->where('type',$type)
                                    ->first();

        $notifier_template->delete();

        return true;
    }

    public function disableTemplate($job_identifier,$type)
    {

        $job = NotifierJob::where('job_identifier',$job_identifier)->first();

        $notifier_template = NotifierTemplate::where('job_identifier_id',$job->id)
                                    ->where('type',$type)
                                    ->first();

        $notifier_template->disabled = true;

        $notifier_template->save();

        return true;
        
    }


    public function enableTemplate($job_identifier,$type)
    {

        $job = NotifierJob::where('job_identifier',$job_identifier)->first();

        $notifier_template = NotifierTemplate::where([
                        'job_identifier_id' => $job->id,
                        'type' => $type
                   ])->first();


        $notifier_template->disabled = false;

        $notifier_template->save();

        return true;
        
    }

    public function getAllJobs()
    {

        $jobs = NotifierJob::paginate(10);

        $data = NotifierResource::collection($jobs);

        return $data;
    }

    public function getAllTemplates()
    {

        $templates = NotifierTemplate::all();

        $data = NotifierResource::collection($templates);

        return $data;
    }


    public function getJobTemplates($job_identifier)
    {

        $job = NotifierJob::where('job_identifier',$job_identifier)->first();

        $templates = $job->templates()->paginate(5);

        $data = NotifierResource::collection($templates);

        return $data;
    }

    public function fillTemplate($job_identifier,$type,$placeholders)
    {

        $job = NotifierJob::where('job_identifier',$job_identifier)->first();

        $notifier_template = NotifierTemplate::where([
                        'job_identifier_id' => $job->id,
                        'type' => $type
                   ])->first();

        $content = json_decode($notifier_template->content, true);

        foreach($content as $content_key => $content_value)
        {
            foreach ($placeholders as $key => $value) {
                $content_value = str_replace('**'.$key.'**', $value, $content_value);
            }

            $content[$content_key] = $content_value;
        }

        return $content;
    }
}
