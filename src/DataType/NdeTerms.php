<?php
namespace NdeTermennetwerk\DataType;

use ValueSuggest\DataType\AbstractDataType;
use NdeTermennetwerk\Suggester\NdeTermsSuggest;

class NdeTerms extends AbstractDataType
{
    protected $ndeTermsName;
    protected $ndeTermsLabel;
    protected $ndeTermsSource;

    public function setNdeTermsName($ndeTermsName)
    {
        $this->ndeTermsName = $ndeTermsName;
    }

    public function setNdeTermsLabel($ndeTermsLabel)
    {
        $this->ndeTermsLabel = $ndeTermsLabel;
    }

    public function setNdeTermsSource($ndeTermsSource)
    {
        $this->ndeTermsSource = $ndeTermsSource;
    }

    public function getSuggester()
    {
        return new NdeTermsSuggest(
            $this->services->get('Omeka\HttpClient'),
            $this->ndeTermsSource,
            $this->services->get('Omeka\ModuleManager')
        );
    }

    public function getName()
    {
        return $this->ndeTermsName;
    }

    public function getLabel()
    {
        return $this->ndeTermsLabel;
    }
}
