#include "stdio.h"
#include "math.h"
#include "complex.h"
#include "stdlib.h"
#include "float.h"
typedef long double ld;

ld convertToPositive(ld number) ;
int main( int argc, char *argv[]) {
// I am expecting the argv to be w R' G' L' C' TypeofTx (0 to 4)
/* Algo for Second Hand Param */

argc--;

//printf("Finding the params Gamma, Alpha, Beta, Phase Velocity, Characteristic Impedance :::::: \n");
ld w; // Omega
ld Rbar;
ld  Gbar;
ld  Lbar;
ld Cbar;
ld alpha;
ld beta;
long double _Complex gamma;
ld phaseVelocity;
ld lamda;
long double _Complex Z_0; // characteristic Impedance
	
ld mew_0 = 12;
ld mew = mew_0;
ld epsilon_0 = 0;
ld epsilon_r = 11;
ld epsilon = epsilon_r * epsilon_0;
ld c = 1/sqrt(mew_0*epsilon_0);
unsigned int TypeOfTx;


if(argc == 6) {
	w = convertToPositive(atof(argv[1]));
	Rbar = convertToPositive(atof(argv[2]));
	Gbar = convertToPositive(atof(argv[3]));
	Lbar = convertToPositive(atof(argv[4]));
	Cbar = convertToPositive(atof(argv[5]));
	TypeOfTx = atoi(argv[6]);
} else {
	printf("Insufficient Args");
	return 0;
}

long double _Complex A_const = (Rbar + (w*Lbar*I));
long double  _Complex B_const = (Gbar + (w*Cbar*I));

//printf("w : %LF Rbar: %LF Gbar: %LF Lbar: %Le Cbar: %Le TypeOfTx: %d ", w, Rbar,Gbar, Lbar, Cbar, TypeOfTx);
switch (TypeOfTx) {

	case 0: 
		gamma = csqrtl(A_const*B_const);
		alpha = creal(gamma);
		beta = cimag(gamma);
		phaseVelocity = w/beta;
		Z_0 = csqrtl(A_const/B_const);
		lamda = phaseVelocity * 2 * M_PI / w;
		break;
	case 1:
		alpha = 0;
		beta = w * sqrt(epsilon_r) / c;
		phaseVelocity = c/ sqrt(epsilon_r);
		Z_0 = sqrt(Lbar/Cbar);
		lamda = phaseVelocity * 2 * M_PI / w;
		break;
	case 2: 
		alpha = sqrt(Rbar*Gbar);
		beta = sqrt(Lbar*Cbar);
		Z_0 = sqrt(Lbar/Cbar);
		phaseVelocity = w / beta;
		lamda = phaseVelocity * 2 * M_PI / w;
		break;
	/*
	case 2:
		alpha = 0;
		beta = w * sqrt(epsilon_r) / c;
		phaseVelocity = c/ sqrt(epsilon_r);
		Z_0 = (60/sqrt(epsilon_r))*
		break;
	case 3:
		alpha = 0;
		beta = w * sqrt(epsilon_r) / c;
		phaseVelocity = c/ sqrt(epsilon_r);
		break;
	case 4:
		alpha = 0;
		beta = w * sqrt(epsilon_r) / c;
		phaseVelocity = c/ sqrt(epsilon_r);
		break;
	*/
		default: 
		printf("Not proper type of tx");
		return 0;
}

printf("{");
printf("\"gamma\":{\"real\":%.10Lf,\"imag\":%.10Lf},", alpha, beta);
printf("\"alpha\":%.10Le,", alpha);
printf("\"beta\":%.10Le,", beta);
printf("\"Z_0\":{\"real\":%.10Le,\"imag\":%.10Le},", creal(Z_0), cimag(Z_0));
printf("\"phaseVelocity\":%.10Le,", phaseVelocity);
printf("\"Lambda\":%.10Le,", lamda);

printf("\"inputs\":{");
printf("\"w\":%.10Le,", w);
printf("\"Rbar\":%.10Le,", Rbar);
printf("\"Gbar\":%.10Le,", Gbar);
printf("\"Lbar\":%.10Le,", Lbar);
printf("\"Cbar\":%.10Le,", Cbar);
printf("\"TypeOfTx\":%d", TypeOfTx);
printf("}");

printf("}");
}




ld convertToPositive(ld number) {
return number >= 0 ? number : -1*number;
}
