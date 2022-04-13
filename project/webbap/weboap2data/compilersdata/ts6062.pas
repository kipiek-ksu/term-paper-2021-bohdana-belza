Program Example_9;
Const N=10;
Var S, S1: Array [1..N] of String [20]; i, j, Kol,K: Byte; St: String[20];
Begin 
For i:=1 to N do
Readln (S[i]);
S1:=S; 
Kol:=0;
For i:=1 to N do
Begin 
K:=0;
For j:=1 to Length (S[i]) do
If  S[i][j] = ‘o’ Then
Inc (K);
If K=3 Then
Inc (Kol)
End;
Writeln (Kol); 
end.