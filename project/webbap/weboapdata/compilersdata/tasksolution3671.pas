Program zad3_10;
   Var a,s,t,k:longint;
Begin
   ReadLn(a);
   s:=0; t:=1;
   While (a div 2)>=1 do
      Begin
         k:=a div 2;
         s:=s+(a mod 2)*t;
         t:=t*10;
         a:=k;
      End;
   s:=s+t;
   WriteLn(s);
End.
