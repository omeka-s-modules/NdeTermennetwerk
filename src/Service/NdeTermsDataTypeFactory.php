<?php
namespace NdeTermennetwerk\Service;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use NdeTermennetwerk\DataType\NdeTerms;

/*
* @todo implement or remove @translate tags
*/

class NdeTermsDataTypeFactory implements FactoryInterface
{
    protected $types = [
        'valuesuggest:ndeterms:aatm' => [
            'label' => 'NDE: Art & Architecture Thesaurus - materials', // @translate
            'source' => 'http://vocab.getty.edu/aat/sparql/materials',
        ],
        'valuesuggest:ndeterms:aatpt' => [
            'label' => 'NDE: Art & Architecture Thesaurus - processes and techniques', // @translate
            'source' => 'http://vocab.getty.edu/aat/sparql/processes-and-techniques',
        ],
        'valuesuggest:ndeterms:aatsp' => [
            'label' => 'NDE: Art & Architecture Thesaurus - styles and periods', // @translate
            'source' => 'http://vocab.getty.edu/aat/sparql/styles-and-periods',
        ],
        'valuesuggest:ndeterms:abr' => [
            'label' => 'NDE: Archaeological Basic Register', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/PoolParty/sparql/term/id/abr',
        ],
        'valuesuggest:ndeterms:adamlink' => [
            'label' => 'NDE: Adamlink: streets in Amsterdam', // @translate
            'source' => 'https://druid.datalegend.net/AdamNet/Geography/sparql#streets',
        ],
        'valuesuggest:ndeterms:btt' => [
            'label' => 'NDE: Brinkman keyword thesaurus', // @translate
            'source' => 'http://data.bibliotheken.nl/thes/brinkman/sparql',
        ],
        'valuesuggest:ndeterms:cht' => [
            'label' => 'NDE: Cultural-Historical Thesaurus', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/PoolParty/sparql/term/id/cht',
        ],
        'valuesuggest:ndeterms:chtm' => [
            'label' => 'NDE: Cultural-Historical Thesaurus - Materials', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/PoolParty/sparql/term/id/cht/materials',
        ],
        'valuesuggest:ndeterms:chtsp' => [
            'label' => 'NDE: Cultural-Historical Thesaurus - Styles and periods', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/PoolParty/sparql/term/id/cht/styles-and-periods',
        ],
        'valuesuggest:ndeterms:eurovoc' => [
            'label' => 'NDE: EuroVoc - thesaurus of the European Union', // @translate
            'source' => 'http://publications.europa.eu/webapi/rdf/sparql#eurovoc',
        ],
        'valuesuggest:ndeterms:geonames' => [
            'label' => 'NDE: GeoNames: gepgraphical names in the Netherlands, Belgium and Germany', // @translate
            'source' => 'https://demo.netwerkdigitaalerfgoed.nl/geonames',
        ],
        'valuesuggest:ndeterms:gtm' => [
            'label' => 'NDE: streets in Gouda', // @translate
            'source' => 'https://www.goudatijdmachine.nl/id/straten#streets',
        ],
        'valuesuggest:ndeterms:gtaaper' => [
            'label' => 'NDE: GTAA: person names', // @translate
            'source' => 'https://data.beeldengeluid.nl/id/datadownload/0026',
        ],
        'valuesuggest:ndeterms:gtaacla' => [
            'label' => 'NDE: GTAA: classification', // @translate
            'source' => 'https://data.beeldengeluid.nl/id/datadownload/0027',
        ],
        'valuesuggest:ndeterms:gtaagen' => [
            'label' => 'NDE: GTAA: genres', // @translate
            'source' => 'https://data.beeldengeluid.nl/id/datadownload/0028',
        ],
        'valuesuggest:ndeterms:gtaageo' => [
            'label' => 'NDE: GTAA: geographic names', // @translate
            'source' => 'https://data.beeldengeluid.nl/id/datadownload/0029',
        ],
        'valuesuggest:ndeterms:gtaanam' => [
            'label' => 'NDE: GTAA: names', // @translate
            'source' => 'https://data.beeldengeluid.nl/id/datadownload/0030',
        ],
        'valuesuggest:ndeterms:gtaaond' => [
            'label' => 'NDE: GTAA: subjects', // @translate
            'source' => 'https://data.beeldengeluid.nl/id/datadownload/0031',
        ],
        'valuesuggest:ndeterms:homosaurus' => [
            'label' => 'NDE: Homosaurus', // @translate
            'source' => 'https://data.ihlia.nl/PoolParty/sparql/homosaurus',
        ],
        'valuesuggest:ndeterms:iconclass' => [
            'label' => 'NDE: Iconclass', // @translate
            'source' => 'https://iconclass.org/sparql',
        ],
        'valuesuggest:ndeterms:ied' => [
            'label' => 'NDE: Indian Heritage Thesaurus', // @translate
            'source' => 'https://digitaalerfgoed.poolparty.biz/PoolParty/sparql/ied',
        ],
        'valuesuggest:ndeterms:muzgs' => [
            'label' => 'NDE: Muziekweb: genres and styles', // @translate
            'source' => 'https://data.muziekweb.nl/MuziekwebOrganization/Muziekweb/sparql/Muziekweb#mw-genresstijlen',
        ],
        'valuesuggest:ndeterms:muzpp' => [
            'label' => 'NDE: Muziekweb: persons and groups', // @translate
            'source' => 'https://data.muziekweb.nl/MuziekwebOrganization/Muziekweb/sparql/Muziekweb#mw-personengroepen',
        ],
        'valuesuggest:ndeterms:muzsch' => [
            'label' => 'NDE: Muziekschatten: subjects', // @translate
            'source' => 'https://data.muziekschatten.nl/sparql/#onderwerpen',
        ],
        'valuesuggest:ndeterms:muzscp' => [
            'label' => 'NDE: Muziekschatten: persons', // @translate
            'source' => 'https://data.muziekschatten.nl/sparql/#personen',
        ],
        'valuesuggest:ndeterms:muzscu' => [
            'label' => 'NDE: Muziekschatten: performance mediums', // @translate
            'source' => 'https://data.muziekschatten.nl/sparql/#uitvoeringsmedium',
        ],
        'valuesuggest:ndeterms:nta' => [
            'label' => 'NDE: Dutch thesaurus of author names', // @translate
            'source' => 'http://data.bibliotheken.nl/thesp/sparql',
        ],
        'valuesuggest:ndeterms:rkdartists' => [
            'label' => 'NDE: RKDartists', // @translate
            'source' => 'https://data.rkd.nl/rkdartists',
        ],
        'valuesuggest:ndeterms:stcn' => [
            'label' => 'NDE: STCN: printers', // @translate
            'source' => 'http://data.bibliotheken.nl/thes/drukkers/sparql',
        ],
        'valuesuggest:ndeterms:tnmw' => [
            'label' => 'NDE: Thesaurus National Museum of World Cultures', // @translate
            'source' => 'https://data.netwerkdigitaalerfgoed.nl/NMVW/thesaurus/sparql',
        ],
        'valuesuggest:ndeterms:tswwnl' => [
            'label' => 'NDE: Thesaurus Second World War Netherlands', // @translate
            'source' => 'https://data.niod.nl/PoolParty/sparql/WO2_Thesaurus',
        ],
        'valuesuggest:ndeterms:ttwn' => [
            'label' => 'NDE: Biographies Second World War Netherlands', // @translate
            'source' => 'https://data.niod.nl/PoolParty/sparql/WO2_Thesaurus',
        ],
        'valuesuggest:ndeterms:wikiall' => [
            'label' => 'NDE: Wikidata: all entities', // @translate
            'source' => 'https://query.wikidata.org/sparql#entities-all',
        ],
        'valuesuggest:ndeterms:wikipers' => [
            'label' => 'NDE: Wikidata: persons', // @translate
            'source' => 'https://query.wikidata.org/sparql#entities-persons',
        ],
        'valuesuggest:ndeterms:wikiplacenlbe' => [
            'label' => 'NDE: Wikidata: places in the Netherlands and Belgium', // @translate
            'source' => 'https://query.wikidata.org/sparql#entities-places',
        ],
        'valuesuggest:ndeterms:wikistrnl' => [
            'label' => 'NDE: Wikidata: streets in the Netherlands', // @translate
            'source' => 'https://query.wikidata.org/sparql#entities-streets',
        ],
        'valuesuggest:ndeterms:bcgebouwen' => [
            'label' => 'NDE: Buildings in Brabant', // @translate
            'source' => 'https://data.brabantcloud.nl/gebouwen/query/',
        ],
        'valuesuggest:ndeterms:kolverleden' => [
            'label' => 'NDE: Colonial Past', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/PoolParty/sparql/koloniaalverleden',
        ],
    ];

    public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
    {
        $dataType = new NdeTerms($services);
        $dataType->setNdeTermsName($requestedName);
        $dataType->setNdeTermsLabel($this->types[$requestedName]['label']);
        $dataType->setNdeTermsSource($this->types[$requestedName]['source']);
        return $dataType;
    }
}
