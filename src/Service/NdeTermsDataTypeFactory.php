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
        'valuesuggest:ndeterms:aat' => [
            'label' => 'NDE: Art & Architecture Thesaurus', // @translate
            'source' => 'http://vocab.getty.edu/aat',
        ],
        'valuesuggest:ndeterms:aatm' => [
            'label' => 'NDE: Art & Architecture Thesaurus - materials', // @translate
            'source' => 'http://vocab.getty.edu/aat#materials',
        ],
        'valuesuggest:ndeterms:aatpt' => [
            'label' => 'NDE: Art & Architecture Thesaurus - processes and techniques', // @translate
            'source' => 'http://vocab.getty.edu/aat#processes-and-techniques',
        ],
        'valuesuggest:ndeterms:aatsp' => [
            'label' => 'NDE: Art & Architecture Thesaurus - styles and periods', // @translate
            'source' => 'http://vocab.getty.edu/aat#styles-and-periods',
        ],
        'valuesuggest:ndeterms:abr' => [
            'label' => 'NDE: Archaeological Basic Register', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/term/id/abr',
        ],
        'valuesuggest:ndeterms:adamadrs' => [
            'label' => 'NDE: Adamlink: historical addresses in Amsterdam', // @translate
            'source' => 'hhttps://adamlink.nl/geo/addresses/start/',
        ],
        'valuesuggest:ndeterms:adamlink' => [
            'label' => 'NDE: Adamlink: streets in Amsterdam', // @translate
            'source' => 'https://adamlink.nl/geo/streets/list',
        ],
        'valuesuggest:ndeterms:btt' => [
            'label' => 'NDE: Brinkman keyword thesaurus', // @translate
            'source' => 'http://data.bibliotheken.nl/id/dataset/brinkman',
        ],
        'valuesuggest:ndeterms:cht' => [
            'label' => 'NDE: Cultural-Historical Thesaurus', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/term/id/cht',
        ],
        'valuesuggest:ndeterms:chtm' => [
            'label' => 'NDE: Cultural-Historical Thesaurus - Materials', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/term/id/cht#materials',
        ],
        'valuesuggest:ndeterms:chtsp' => [
            'label' => 'NDE: Cultural-Historical Thesaurus - Styles and periods', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/term/id/cht#styles-and-periodes',
        ],
        'valuesuggest:ndeterms:eurovoc' => [
            'label' => 'NDE: EuroVoc - thesaurus of the European Union', // @translate
            'source' => 'https://data.europa.eu/data/datasets/eurovoc',
        ],
        'valuesuggest:ndeterms:geonames' => [
            'label' => 'NDE: GeoNames: geographical names in the Netherlands, Belgium and Germany', // @translate
            'source' => 'https://www.geonames.org#nl-be-de',
        ],
        'valuesuggest:ndeterms:geonamesall' => [
            'label' => 'NDE: GeoNames: global geographical names', // @translate
            'source' => 'https://www.geonames.org',
        ],
        'valuesuggest:ndeterms:gtm' => [
            'label' => 'NDE: Gouda streets', // @translate
            'source' => 'https://www.goudatijdmachine.nl/id/straten',
        ],
        'valuesuggest:ndeterms:gtaaper' => [
            'label' => 'NDE: GTAA: person names', // @translate
            'source' => 'http://data.beeldengeluid.nl/gtaa/Persoonsnamen',
        ],
        'valuesuggest:ndeterms:gtaacla' => [
            'label' => 'NDE: GTAA: classification', // @translate
            'source' => 'http://data.beeldengeluid.nl/gtaa/Classificatie',
        ],
        'valuesuggest:ndeterms:gtaagen' => [
            'label' => 'NDE: GTAA: genres', // @translate
            'source' => 'http://data.beeldengeluid.nl/gtaa/Genre',
        ],
        'valuesuggest:ndeterms:gtaageo' => [
            'label' => 'NDE: GTAA: geographical names', // @translate
            'source' => 'http://data.beeldengeluid.nl/gtaa/GeografischeNamen',
        ],
        'valuesuggest:ndeterms:gtaanam' => [
            'label' => 'NDE: GTAA: names', // @translate
            'source' => 'http://data.beeldengeluid.nl/gtaa/Namen',
        ],
        'valuesuggest:ndeterms:gtaaond' => [
            'label' => 'NDE: GTAA: subjects', // @translate
            'source' => 'http://data.beeldengeluid.nl/gtaa/Onderwerpen',
        ],
        'valuesuggest:ndeterms:homosaurus' => [
            'label' => 'NDE: Homosaurus', // @translate
            'source' => 'https://data.ihlia.nl/homosaurus',
        ],
        'valuesuggest:ndeterms:iconclass' => [
            'label' => 'NDE: Iconclass', // @translate
            'source' => 'https://iconclass.org',
        ],
        'valuesuggest:ndeterms:ied' => [
            'label' => 'NDE: Dutch East Indies Heritage Thesaurus', // @translate
            'source' => 'https://data.indischherinneringscentrum.nl/ied',
        ],
        'valuesuggest:ndeterms:muzgs' => [
            'label' => 'NDE: Music: genres and styles', // @translate
            'source' => 'https://data.muziekweb.nl/MuziekwebOrganization/Muziekweb#mw-genresstijlen',
        ],
        'valuesuggest:ndeterms:muzpp' => [
            'label' => 'NDE: Music: persons and groups', // @translate
            'source' => 'https://data.muziekweb.nl/MuziekwebOrganization/Muziekweb#mw-personengroepen',
        ],
        'valuesuggest:ndeterms:muzsch' => [
            'label' => 'NDE: Muziekschatten: subjects', // @translate
            'source' => 'https://data.muziekschatten.nl/#onderwerpen',
        ],
        'valuesuggest:ndeterms:muzscp' => [
            'label' => 'NDE: Muziekschatten: persons', // @translate
            'source' => 'https://data.muziekschatten.nl/#personen',
        ],
        'valuesuggest:ndeterms:muzscu' => [
            'label' => 'NDE: Muziekschatten: performance mediums', // @translate
            'source' => 'https://data.muziekschatten.nl/som/Uitvoeringsmedium',
        ],
        'valuesuggest:ndeterms:nta' => [
            'label' => 'NDE: Dutch thesaurus of author names', // @translate
            'source' => 'http://data.bibliotheken.nl/id/dataset/persons',
        ],
        'valuesuggest:ndeterms:rtf' => [
            'label' => 'NDE: Regiotermen Fryslân: Persons', // @translate
            'source' => 'https://fryslan.regiotermen.nl/personen',
        ],
        'valuesuggest:ndeterms:rkdartists' => [
            'label' => 'NDE: RKDartists', // @translate
            'source' => 'https://data.rkd.nl/rkdartists',
        ],
        'valuesuggest:ndeterms:stcn' => [
            'label' => 'NDE: STCN: printers', // @translate
            'source' => 'http://data.bibliotheken.nl/id/dataset/stcn/printers',
        ],
        'valuesuggest:ndeterms:tnmw' => [
            'label' => 'NDE: Thesaurus National Museum of World Cultures', // @translate
            'source' => 'https://data.colonialcollections.nl/nmvw/thesaurus',
        ],
        'valuesuggest:ndeterms:tswwnl' => [
            'label' => 'NDE: Thesaurus WW2', // @translate
            'source' => 'https://data.niod.nl/WO2_biografieen',
        ],
        'valuesuggest:ndeterms:ttwn' => [
            'label' => 'NDE: WW2 biographies', // @translate
            'source' => 'https://data.niod.nl/WO2_Thesaurus',
        ],
        'valuesuggest:ndeterms:wikiall' => [
            'label' => 'NDE: Wikidata: all entities', // @translate
            'source' => 'https://query.wikidata.org/sparql#entities-all',
        ],
        'valuesuggest:ndeterms:wikipers' => [
            'label' => 'NDE: Wikidata: persons', // @translate
            'source' => 'https://www.wikidata.org#entities-persons',
        ],
        'valuesuggest:ndeterms:wikiplacenlbe' => [
            'label' => 'NDE: Wikidata: places in the Netherlands and Belgium', // @translate
            'source' => 'https://www.wikidata.org#entities-places',
        ],
        'valuesuggest:ndeterms:wikistrnl' => [
            'label' => 'NDE: Wikidata: streets in the Netherlands', // @translate
            'source' => 'https://www.wikidata.org#entities-streets',
        ],
        'valuesuggest:ndeterms:bcgebouwen' => [
            'label' => 'NDE: Buildings in Brabant', // @translate
            'source' => 'https://data.brabantcloud.nl/gebouwen',
        ],
        'valuesuggest:ndeterms:kolverleden' => [
            'label' => 'NDE: Colonial Past', // @translate
            'source' => 'https://data.cultureelerfgoed.nl/koloniaalverleden/',
        ],
        'valuesuggest:ndeterms:rcemon' => [
            'label' => 'NDE: National Monuments Register RCE', // @translate
            'source' => 'https://linkeddata.cultureelerfgoed.nl/cho-kennis/id/rijksmonument/',
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
