program fact;
Var
     Fact:Integer;
     N,I:Integer;
Begin
        Readln(N);
        Fact:=1;
        For I:=2 To N-1 Do
        Fact:=Fact*I;
        Write(Fact);
End.