program prg9_14;
Type symbol = set of char;
var S,f:string;
    M:symbol;
    d:array[1..10] of string;
    i,j,l:integer;
    ch:char;
begin
     l:=1;
     d[1]:='1'; d[2]:='2'; d[3]:='3'; d[4]:='4'; d[5]:='5';
     d[6]:='6'; d[7]:='7'; d[8]:='8'; d[9]:='9'; d[10]:='0';
     read(S);
     for i:=1 to length(S) do
     begin
          for j:=1 to 10 do
              if (S[i] = d[j]) then
              begin
                   M:=M+[S[i]];
                   l:=l+1;
                   d[j]:='x';
              end;
     end;
     for ch:=#0 to #255 do
         if ch in M then write(ch);
end.