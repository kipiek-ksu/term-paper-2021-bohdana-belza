program t10z36;

const c=30;

var fname:string;
    fail,fail2:text;
    sa:real;
    n,s,l,code:integer;
    mem,link,g:string;

begin
clrscr;
    
    read(fname);

    Assign(fail,'input.txt');

    ReSet(fail);


    assign(fail2,fname);
    rewrite(fail2);

    s:=0;
    n:=0;
    mem:='';
    while (not eof(fail)) do
    begin
    readln(fail,mem);
    val(mem,l,code);
    if code=0 then
     begin
         if ((l mod 2)=0) then
         begin
         write(fail2,l);
         write(l:3);
         write(fail2,' ');
         end;

     end;
    end;

    close(fail);
    close(fail2);

  
    
end.