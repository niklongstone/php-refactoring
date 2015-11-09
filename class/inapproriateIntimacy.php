<?php

function getAsXML($uri) {
    $this->session->setUserSession();
    $this->service->setServiceUri($uri);
    $this->session->addHeaders($this->getRequestHeaders());
    $this->getServiceInvoker()->setMethod(ServiceInvoker::GET);

    return $this->getResponseAsSimpleXml();
}

//----------------------------------------------------------------------
function getAsXML() {
    $request = $this->client->createRequest();
    $options = $this->client->createOptions();
    $response = $this->service->sendRequest($request, $options);

    return $this->getAsSimpleXml($response);
}
