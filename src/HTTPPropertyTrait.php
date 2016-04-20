<?php

namespace Liuggio\Filler;

use Symfony\Component\HttpFoundation\Request;

trait HTTPPropertyTrait
{
    use PropertyTrait;

    public function fillPropertiesFromRequest(Request $request, $name = '')
    {
        $data = $this->_extractData($request, $name);
        $this->fillProperties($data);
    }

    public function copyPropertiesFromRequest(Request $request, $to)
    {
        $data = $this->_extractData($request);
        $this->fillProperties($data, $to);
    }

    private function _extractData(Request $request = null, $name = '')
    {
        $method = $request->getMethod();

        if ('GET' === $method) {
            if ('' === $name) {
                $data = $request->query->all();
            } else {
                // Don't submit GET requests if the form's name does not exist
                // in the request
                if (!$request->query->has($name)) {
                    return;
                }

                $data = $request->query->get($name);
            }
        } else {
            if ('' === $name) {
                $params = $request->request->all();
                $files = $request->files->all();
            } elseif ($request->request->has($name) || $request->files->has($name)) {
                $default = null;
                $params = $request->request->get($name, $default);
                $files = $request->files->get($name, $default);
            } else {
                // Don't submit the form if it is not present in the request
                return;
            }

            if (is_array($params) && is_array($files)) {
                $data = array_replace_recursive($params, $files);
            } else {
                $data = $params ?: $files;
            }
        }

        return $data;
    }
}
