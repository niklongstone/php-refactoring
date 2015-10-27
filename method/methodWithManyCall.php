<?php
  function get($uri) {
      $this->setUserSession();
      $this->setServiceUri($uri);
      $this->setHeaders();
      $this->getServiceInvoker()->setMethod(ServiceInvoker::GET);
      $response = $this->sendRequest();
      $this->updateSessionCookie();
      $this->validateResponse();

      return $this->convertResponseToCorrectRepresentation($response);
  }

//----------------------------------------------------------------------
function getSomething() {
    $request = $this->createRequestForDao();
    $response = $this->dao->send($request);

    return $this->convertResponseToCorrectRepresentation($response);
}
