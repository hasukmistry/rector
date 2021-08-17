<?php

declare (strict_types=1);
namespace RectorPrefix20210817;

use PHPStan\Type\ArrayType;
use PHPStan\Type\BooleanType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\MixedType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use PHPStan\Type\TypeCombinator;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Namespace_\RenameNamespaceRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector;
use Rector\Transform\ValueObject\MethodCallToStaticCall;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration;
use Ssch\TYPO3Rector\FileProcessor\Yaml\Form\Rector\EmailFinisherRector;
use Ssch\TYPO3Rector\FileProcessor\Yaml\Form\Rector\TranslationFileRector;
use Ssch\TYPO3Rector\Rector\General\ExtEmConfRector;
use Ssch\TYPO3Rector\Rector\v10\v0\BackendUtilityGetViewDomainToPageRouterRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ChangeDefaultCachingFrameworkNamesRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ConfigurationManagerAddControllerConfigurationMethodRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ForceTemplateParsingInTsfeAndTemplateServiceRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RefactorIdnaEncodeMethodToNativeFunctionRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RemovePropertyExtensionNameRector;
use Ssch\TYPO3Rector\Rector\v10\v0\SetSystemLocaleFromSiteLanguageRector;
use Ssch\TYPO3Rector\Rector\v10\v0\SwiftMailerBasedMailMessageToMailerBasedMessageRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseControllerClassesInExtbasePluginsAndModulesRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseMetaDataAspectRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseNativePhpHex2binMethodRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseTwoLetterIsoCodeFromSiteLanguageRector;
use Ssch\TYPO3Rector\Rector\v10\v4\RemoveFormatConstantsEmailFinisherRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../config.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\RemovePropertyExtensionNameRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\UseNativePhpHex2binMethodRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\RefactorIdnaEncodeMethodToNativeFunctionRector::class);
    $services->set('rename_namespace_backend_controller_file_to_filelist_controller_file')->class(\Rector\Renaming\Rector\Namespace_\RenameNamespaceRector::class)->call('configure', [[\Rector\Renaming\Rector\Namespace_\RenameNamespaceRector::OLD_TO_NEW_NAMESPACES => ['TYPO3\\CMS\\Backend\\Controller\\File' => 'TYPO3\\CMS\\Filelist\\Controller\\File']]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\UseMetaDataAspectRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\ForceTemplateParsingInTsfeAndTemplateServiceRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\BackendUtilityGetViewDomainToPageRouterRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\SetSystemLocaleFromSiteLanguageRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\ConfigurationManagerAddControllerConfigurationMethodRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v4\RemoveFormatConstantsEmailFinisherRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\UseTwoLetterIsoCodeFromSiteLanguageRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\UseControllerClassesInExtbasePluginsAndModulesRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\ChangeDefaultCachingFrameworkNamesRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\General\ExtEmConfRector::class)->call('configure', [[\Ssch\TYPO3Rector\Rector\General\ExtEmConfRector::ADDITIONAL_VALUES_TO_BE_REMOVED => ['createDirs', 'uploadfolder']]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\SwiftMailerBasedMailMessageToMailerBasedMessageRector::class);
    $services->set('rename_database_record_list_thumb_code_backend_utility_thumb_code')->class(\Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector::class)->call('configure', [[\Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector::METHOD_CALLS_TO_STATIC_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\MethodCallToStaticCall('TYPO3\\CMS\\Recordlist\\RecordList\\DatabaseRecordList', 'thumbCode', 'TYPO3\\CMS\\Backend\\Utility\\BackendUtility', 'thumbCode')])]]);
    $services->set('rename_database_record_list_request_uri_to_list_url')->class(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename('TYPO3\\CMS\\Recordlist\\RecordList\\DatabaseRecordList', 'requestUri', 'listURL')])]]);
    $services->set(\Ssch\TYPO3Rector\FileProcessor\Yaml\Form\Rector\EmailFinisherRector::class);
    $services->set(\Ssch\TYPO3Rector\FileProcessor\Yaml\Form\Rector\TranslationFileRector::class);
    $services->set(\Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector::class)->call('configure', [[\Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector::METHOD_RETURN_TYPES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface', 'getUid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface', 'getPid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface', '_isNew', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface', '_getProperties', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\AbstractDomainObject', 'getUid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\AbstractDomainObject', 'getPid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\AbstractDomainObject', '_isNew', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Service\\ImageService', 'applyProcessingInstructions', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Core\\Resource\\ProcessedFile')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Service\\ImageService', 'getImageUri', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Service\\ImageService', 'getImage', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Core\\Resource\\FileInterface')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getSupportedSourceTypes', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getSupportedTargetType', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getTargetTypeForSource', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getPriority', new \PHPStan\Type\IntegerType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'canConvertFrom', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getSourceChildPropertiesToBeConverted', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getTypeOfChildProperty', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'convertFrom', new \PHPStan\Type\MixedType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'getMessage', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'getCode', new \PHPStan\Type\IntegerType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'getArguments', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'getTitle', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'render', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager', 'getContentObject', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer'))), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager', 'getConfiguration', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager', 'isFeatureEnabled', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'reset', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'build', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'uriFor', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setAbsoluteUriScheme', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setAddQueryString', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setAddQueryStringMethod', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setArgumentPrefix', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setArguments', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setArgumentsToBeExcludedFromQueryString', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setCreateAbsoluteUri', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setFormat', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setLinkAccessRestrictedPages', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setNoCache', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setSection', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setTargetPageType', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setTargetPageUid', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setUseCacheHash', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getAddQueryString', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getAddQueryStringMethod', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getArguments', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getArgumentsToBeExcludedFromQueryString', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getCreateAbsoluteUri', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getFormat', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getLinkAccessRestrictedPages', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getNoCache', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getSection', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getTargetPageUid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getUseCacheHash', new \PHPStan\Type\BooleanType())])]]);
};
