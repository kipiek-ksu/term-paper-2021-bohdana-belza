Program weboap09;
var
   A:array[1..1000] of real;
   n:integer;
   Procedure Inp(var A:array of real;n:integer);
   var
      i:integer;
   begin
        for i:=0 to n-1 do read(A[i])
   end;
   Procedure Out(var A:array of real;n:integer);
   var
      i:integer;
   begin
        for i:=0 to n-2 do write(A[i]:3:1,' ');
        write(A[n-1]:3:1)
   end;
   Procedure ShellSort(var A:array of real;n:integer);
   var
      l,i,j:integer;
      buf:real;
      S,P:integer;
      bool:boolean;
   begin
        S:=1;
        P:=0;
        l:=n div 2;
        while l>0 do begin
              for i:=l to n-1 do begin
                  j:=i-l;
                  bool:=A[j]>A[j+l];
                  S:=S+1;
                  while (j>=0) and bool do begin
                        buf:=A[j];
                        A[j]:=A[j+l];
                        A[j+l]:=buf;
                        P:=P+1;
                        j:=j-l;
                        if j>=0 then begin
                           bool:=A[j]>A[j+l];
                            S:=S+1
                           end;
                        Out(A,n);
                        writeln;
                  end;
              end;
              l:=l div 2
        end;
        writeln(S);
        writeln(P)
   end;
begin
     read(n);
     Inp(A,n);
     ShellSort(A,n);
     Out(A,n)
end.