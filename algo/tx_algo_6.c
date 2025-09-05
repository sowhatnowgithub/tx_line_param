#include "stdio.h"
#include "math.h"
#include "complex.h"
#include "stdlib.h"
#include "float.h"
typedef long double ld;

ld convertToPositive(ld number) ;

int main( int argc, char *argv[]) { // beta alpha Z_0 reffCoeff_mag reffCoeff_phase					
	ld reffCoeff_mag;
	ld reffCoeff_phase;
	ld beta;
	ld alpha;
	ld Z_0;
	ld d; // distance
	ld lamda;

	ld V[10][10];
	long double _Complex Z_d;
argc--;
	if(argc == 5) {
		beta = convertToPositive(atof(argv[1]));
		alpha = convertToPositive(atof(argv[2]));
		Z_0 = convertToPositive(atof(argv[3]));
		reffCoeff_mag = atof(argv[4]);
		reffCoeff_phase = atof(argv[5]);
	}else {
		printf("Insufficient Args");
		return 0;
	}
	lamda = 2*M_PI / beta;
	ld G_0;
	long double complex reffCoeff_d;
	d = lamda / 2;
	double delta = d*0.1;
	int count = 0;
	while ( d != 0 && count != 10) {
		d = d - delta;
		V[count][0] = alpha;	
		V[count][1] = beta;	
		V[count][2] = 1/Z_0;
		V[count][3] = reffCoeff_mag;	
		V[count][4] = reffCoeff_phase;	
		V[count][5] = d;
		G_0 = 1/Z_0;
		ld phase = reffCoeff_phase - (2*beta*d);
		reffCoeff_d = reffCoeff_mag * (cos(phase)+(sin(phase)*I));
		Z_d = Z_0 * (1+reffCoeff_d)/(1-reffCoeff_d);
		Z_d = 1/Z_d;
		V[count][6] = creal(Z_d);
		V[count][7] = cimag(Z_d);
		V[count][8] = G_0 - creal(Z_d);
		V[count][9] = -1*cimag(Z_d);
		count++;
		if(d <= 2*delta) {
		V[count][0] = alpha;	
		V[count][1] = beta;	
		V[count][2] = Z_0;
		V[count][3] = reffCoeff_mag;	
		V[count][4] = reffCoeff_phase;	
		V[count][5] = 0;
		d = 0;
		G_0 = 1/Z_0;
		phase = reffCoeff_phase;
	reffCoeff_d = reffCoeff_mag * (cos(phase)+(sin(phase)*I));
		Z_d = Z_0 * (1+reffCoeff_d)/(1-reffCoeff_d);
		Z_d = 1/Z_d;
		V[count][6] = creal(Z_d);
		V[count][7] = cimag(Z_d);
		V[count][8] = G_0 - creal(Z_d);
		V[count][9] = -1*cimag(Z_d);
	count++;
		}
	} 

printf("{");

printf("\"inputs\":{");
printf("\"alpha\":%Le,", alpha);
printf("\"beta\":%Le,", beta);
printf("\"Z_0\":%Le,", Z_0);
printf("\"reffCoeff_mag\":%Le,", reffCoeff_mag);
printf("\"reffCoeff_phase\":%Le", reffCoeff_phase);
printf("},");

printf("\"outputs\":{");
printf("\"lamda\":%Le", lamda);
printf("},");

printf("\"V\":[");
for (int i = 0; i < count; i++) {
    printf("[");
    for (int j = 0; j < 10; j++) {
        printf("%Le", V[i][j]);
        if (j != 9) printf(",");
    }
    printf("]");
    if (i != count - 1) printf(",");
}
printf("]");

printf("}");


	return 0;
}


ld convertToPositive(ld number) {
return number >= 0 ? number : -1*number;
}
