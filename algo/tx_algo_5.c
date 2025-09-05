#include "stdio.h"
#include "stdlib.h"
#include "float.h"
#include "math.h"

typedef long double ld;


ld convertToPositive(ld number) {
return number >= 0 ? number : -1*number;
}
int main(int argc, char *argv[]) { // alpha beta Z_0 volRef_mag volReg_phase V0_mag 

	ld V0;
	ld volRef_mag;
	ld volRef_phase;
	ld alpha ;
	ld beta;
	ld Z_0;
	ld lamda;
	
	long double V[100][2];
	long double I[100][2];
	
	ld VSWR;
	argc--;

	if(argc == 6) {
		alpha = convertToPositive(atof(argv[1]));
		beta = convertToPositive(atof(argv[2]));
		Z_0 = convertToPositive(atof(argv[3]));
		volRef_mag = convertToPositive(atof(argv[4]));
		volRef_phase = atof(argv[5]);
		V0 = convertToPositive(atof(argv[6]));
	}else {
		printf("Insuffiecient Args");
		return 0;
	}
	
double d; // distance

	lamda = 2 * M_PI / beta;
	long double Vmax = 1 + volRef_mag;
	long double Vmin = 1 - volRef_mag;
	VSWR = Vmax / Vmin;
	// we will increase d from o to lambda and then take all the values and then store them in an array and give them as json
	
	d = lamda;
		int count = 0;
		double delta = d/100.00;
	while( d != 0 && count != 100) {

		V[count][0] = d;
		I[count][0] = d;
		V[count][1] = V0*sqrt(1+(volRef_mag*volRef_mag)+(2*volRef_mag*cos((2*beta*d)-volRef_phase)));
		I[count][1] = V[count][1]/Z_0;
		d = d - delta;
		count++;
		if(d <= 2* delta) {
			d = 0;
V[count][0] = d;
		I[count][0] = d;
			V[count][1] = V0*sqrt(1+(volRef_mag*volRef_mag)+(2*volRef_mag*cos(-1*volRef_phase)));
		I[count][1] = V[count][1]/Z_0;
		count++;
		break;
		}
		
	}
printf("{");
printf("\"inputs\":{");
printf("\"V0\":%Le,", V0);
printf("\"volRef_mag\":%Le,", volRef_mag);
printf("\"volRef_phase\":%Le,", volRef_phase);
printf("\"alpha\":%Le,", alpha);
printf("\"beta\":%Le,", beta);
printf("\"Z_0\":%Le,", Z_0);
printf("\"lamda\":%Le", lamda);
printf("},");

printf("\"outputs\":{");
printf("\"lamda\":%Le,", lamda);
printf("\"Vmax\":%Le,", Vmax);
printf("\"Vmin\":%Le,", Vmin);
printf("\"VSWR\":%Le", VSWR);
printf("},");

printf("\"V\":[");
for (int i = 0; i < 100; i++) {
    printf("[%Le,%Le]%s", V[i][0], V[i][1], (i == 99) ? "" : ",");
}
printf("],");

printf("\"I\":[");
for (int i = 0; i < 100; i++) {
    printf("[%Le,%Le]%s", I[i][0], I[i][1], (i == 99) ? "" : ",");
}
printf("]");

printf("}");



	return 0;
}
