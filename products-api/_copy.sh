date=`date +"%H.%M"`

downloads="$HOME/Téléchargements"
target="$downloads/Téléchargements/Copies/CP-Symfony-$date"

mkdir -p $target

cp *.yaml $target
cp *.json $target

cp -r bin $target
cp -r config $target
cp -r migrations $target
cp -r public $target
cp -r src $target
cp -r templates $target

echo "Copie vers Quotidien > $date"