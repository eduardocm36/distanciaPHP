class ArtisanCommand {
    static artisan() {
        const { spawn } = require('child_process');
        const chalk = require('chalk');
        const { Command } = require('./../../node_modules/commander');
        const program = new Command();
        console.log(chalk.green(`Starting to build!`));
        program
            .version('1.0.0')
            .command('c [component]')
            .alias('component')
            .description('Genera un componente')
            .option('--ns <ns>', 'Estructura de directorios y archivos', 'App')
            .option('--path <path>', 'Ruta del componente', null)
            .action((component, options) => {
                const { ns: optNs, path: optPath } = options;
                if (!component) {
                    console.error(chalk.red('Error: Debe especificar el nombre del componente.'));
                    process.exit(1);
                }
                console.log(chalk.green(`\n ${component} component!`));
                console.log(chalk.green(`\n ${options} options!`));
                // const phpScript = spawn('php', [
                //     'artisan',
                //     'c',
                //     `${component}`,
                //     `--ns=${optNs}`,
                //     `--path=${optPath}`
                // ], {
                //     stdio: 'inherit'
                // });
                // phpScript.on('error', (err) => {
                //     console.error(chalk.red(`Error: ${err.message}`));
                //     process.exit(1);
                // });
                // phpScript.on('exit', (code) => {
                //     if (code === 0) {
                //         console.log(chalk.green(`\n ${component} created!`));
                //     }
                // });
            });
        program.parse(process.argv);
    }
}
module.exports = ArtisanCommand;

const config = {
    type: 'bar',
    data,
    options: {
        plugins: {
            annotation: {
                annotations: {
                    annotation1,
                    annotation2,
                    annotation3,
                    annotation4
                }
            }
        }
    }
};


var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["red", "green", "blue", "orange", "brown"];

new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        plugins: {
            datalabels: {
                display: false // Oculta las etiquetas de datos predeterminadas
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        },
        annotations: {
            labels: Object.values(barras).map(function (value) {
                return {
                    font: {
                        size: 16
                    },
                    color: 'black',
                    textAlign: 'center',
                    position: 'top',
                    enabled: true, // Activa la etiqueta
                    content: value.toString(), // Contenido de la etiqueta
                    yAdjust: -20 // Ajuste vertical de la etiqueta
                };
            })
        }
    }
});